<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TelegramWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $update = $request->all();

        // Abaikan update selain pesan masuk biasa
        if (!isset($update['message'])) {
            return response()->json(['ok' => true]);
        }

        // Definisikan $message terlebih dahulu sebelum mengecek tipe chat
        $message = $update['message'];

        // Abaikan semua pesan & notifikasi (member baru masuk, dll) dari Grup / Supergroup / Channel
        if (($message['chat']['type'] ?? '') !== 'private') {
            return response()->json(['status' => 'ignored_non_private']);
        }

        $chatId = (string) $message['chat']['id'];
        $username = $message['from']['username'] ?? null;
        $botToken = Setting::get('telegram_bot_token', env('TELEGRAM_BOT_TOKEN'));

        if (!$botToken) {
            Log::error('Telegram Bot Token belum diatur.');
            return response()->json(['ok' => true]);
        }

        // 1. JIKA USER MENGIRIM TEKS (Termasuk command /start INV-XXXX)
        if (isset($message['text'])) {
            $text = trim($message['text']);

            if (str_starts_with($text, '/start')) {
                $this->handleStartCommand($chatId, $username, $text, $botToken);
            } else {
                $this->sendMessage(
                    $botToken,
                    $chatId,
                    "Silakan kirimkan <b>foto / screenshot bukti transfer</b> Anda di sini untuk verifikasi otomatis."
                );
            }

            return response()->json(['ok' => true]);
        }

        // 2. JIKA USER MENGIRIM FOTO (Bukti Transfer)
        if (isset($message['photo'])) {
            $this->handlePhotoReceipt($chatId, $message['photo'], $botToken);
            return response()->json(['ok' => true]);
        }

        // Jika mengirim tipe file lain (dokumen/stiker/dll)
        $this->sendMessage(
            $botToken,
            $chatId,
            "⚠️ Mohon kirimkan bukti transfer dalam bentuk <b>Foto/Gambar</b> (bukan file dokumen)."
        );

        return response()->json(['ok' => true]);
    }

    /**
     * Menangani command /start dan mengikat telegram_chat_id ke data User
     */
    private function handleStartCommand(string $chatId, ?string $username, string $text, string $botToken): void
    {
        $parts = explode(' ', $text);
        $invoiceNumber = $parts[1] ?? null;

        if (!$invoiceNumber) {
            $this->sendMessage(
                $botToken,
                $chatId,
                "Halo! Selamat datang di <b>Ayo Fasih!</b> 🎉\n\nSilakan lakukan pendaftaran melalui website terlebih dahulu, lalu klik tombol <b>Konfirmasi Via Bot Telegram</b> pada halaman checkout."
            );
            return;
        }

        $payment = Payment::with(['user', 'package'])
            ->where('invoice_number', $invoiceNumber)
            ->first();

        if (!$payment) {
            $safeInvoice = e($invoiceNumber);
            $this->sendMessage(
                $botToken,
                $chatId,
                "❌ Nomor Invoice <b>{$safeInvoice}</b> tidak ditemukan. Pastikan Anda mengklik link dari halaman checkout website."
            );
            return;
        }

        // Simpan / update Telegram Chat ID & Username ke tabel users
        $payment->user->update([
            'telegram_chat_id' => $chatId,
            'telegram_username' => $username,
        ]);

        if ($payment->status === 'paid') {
            $safeInvoice = e($invoiceNumber);
            $this->sendMessage(
                $botToken,
                $chatId,
                "✅ Invoice <b>{$safeInvoice}</b> sudah lunas dan terverifikasi sebelumnya."
            );
            return;
        }

        $nominal = number_format($payment->total_amount, 0, ',', '.');
        $userName = e($payment->user->name);
        $packageName = e($payment->package->name ?? '-');
        $safeInvoice = e($payment->invoice_number);

        $reply = "Halo <b>{$userName}</b>! 👋\n\n"
            . "Akun Telegram Anda telah terhubung dengan tagihan:\n"
            . "🧾 Invoice: <code>{$safeInvoice}</code>\n"
            . "📦 Paket: <b>{$packageName}</b>\n"
            . "💰 Nominal Transfer: <b>Rp {$nominal}</b>\n\n"
            . "Silakan <b>kirimkan foto/screenshot bukti transfer</b> Anda langsung di chat ini untuk diverifikasi otomatis.";

        $this->sendMessage($botToken, $chatId, $reply);
    }

    /**
     * Memproses foto bukti transfer menggunakan OCR.space & auto-invite jika valid
     */
    private function handlePhotoReceipt(string $chatId, array $photos, string $botToken): void
    {
        // Cari langsung tagihan pending/unpaid terbaru milik user dengan chat_id ini
        $payment = Payment::whereHas('user', function ($query) use ($chatId) {
            $query->where('telegram_chat_id', $chatId);
        })
            ->whereIn('status', ['pending', 'unpaid'])
            ->latest()
            ->first();

        if (!$payment) {
            $this->sendMessage(
                $botToken,
                $chatId,
                "ℹ️ Anda tidak memiliki tagihan yang menunggu pembayaran saat ini."
            );
            return;
        }

        $user = $payment->user;

        // Pesan memindai baru dikirim SETELAH tagihan dipastikan ketemu
        $this->sendMessage($botToken, $chatId, "⏳ Sedang memindai bukti transfer Anda, mohon tunggu sebentar...");

        // Ambil resolusi foto tertinggi (elemen terakhir dari array photo Telegram)
        $largestPhoto = end($photos);
        $fileId = $largestPhoto['file_id'];

        // 1. Dapatkan file_path dari Telegram API
        $fileResponse = Http::get("https://api.telegram.org/bot{$botToken}/getFile", [
            'file_id' => $fileId,
        ]);

        if (!$fileResponse->successful() || !isset($fileResponse->json()['result']['file_path'])) {
            $this->sendMessage($botToken, $chatId, "❌ Gagal mengambil gambar dari server Telegram. Silakan coba kirim ulang.");
            return;
        }

        $filePath = $fileResponse->json()['result']['file_path'];
        $telegramFileUrl = "https://api.telegram.org/file/bot{$botToken}/{$filePath}";

        // Simpan salinan struk ke storage lokal agar bisa dilihat admin di Filament
        $imageContents = Http::get($telegramFileUrl)->body();
        $localFileName = 'receipts/' . $payment->invoice_number . '_' . time() . '.jpg';
        Storage::disk('public')->put($localFileName, $imageContents);
        $payment->update(['receipt_image' => $localFileName]);

        // 2. Tembak ke OCR.space API
        $ocrApiKey = Setting::get('ocr_space_api_key', env('OCR_SPACE_API_KEY'));

        $ocrResponse = Http::timeout(30)
            ->withHeaders([
                'apikey' => $ocrApiKey,
            ])
            ->attach('file', $imageContents, 'receipt.jpg')
            ->post('https://api.ocr.space/parse/image', [
                'language' => 'eng',
                'isOverlayRequired' => 'false',
                'scale' => 'true',
                'OCREngine' => '2',
            ]);

        if (!$ocrResponse->successful()) {
            Log::error('OCR Space HTTP Error: ' . $ocrResponse->body());
            $this->sendMessage($botToken, $chatId, "⚠️ Server pemindai sedang sibuk. Silakan kirim ulang foto Anda beberapa saat lagi.");
            return;
        }

        $ocrData = $ocrResponse->json();

        if (!empty($ocrData['IsErroredOnProcessing']) && $ocrData['IsErroredOnProcessing'] === true) {
            Log::error('OCR Space Processing Error: ', $ocrData);
            $this->sendMessage($botToken, $chatId, "⚠️ Gagal memproses gambar di server OCR. Silakan hubungi admin.");
            return;
        }

        $parsedText = $ocrData['ParsedResults'][0]['ParsedText'] ?? '';

        // 3. Bersihkan semua karakter selain angka
        $extractedNumbers = preg_replace('/[^0-9]/', '', $parsedText);
        $targetAmount = (string) $payment->total_amount;

        // 4. Cocokkan nominal tagihan dengan hasil scan OCR
        if (str_contains($extractedNumbers, $targetAmount)) {
            $this->approvePaymentAndInvite($payment, $user, $chatId, $botToken);
        } else {
            $formattedAmount = number_format($payment->total_amount, 0, ',', '.');
            $uniqueCode = e($payment->unique_code);

            $this->sendMessage(
                $botToken,
                $chatId,
                "❌ <b>Nominal Tidak Terdeteksi / Tidak Sesuai</b>\n\n"
                . "Sistem tidak menemukan nominal <b>Rp {$formattedAmount}</b> pada struk yang Anda kirim.\n"
                . "Pastikan:\n"
                . "1. Foto bukti transfer jelas &amp; tidak buram.\n"
                . "2. Nominal terlihat utuh beserta 3 digit kode unik (<b>{$uniqueCode}</b>).\n\n"
                . "Silakan kirim ulang screenshot yang lebih jelas."
            );
        }
    }

    /**
     * Update status lunas, aktifkan subscription per package_id, dan buat link grup & channel 1x pakai
     */
    /**
         * Update status lunas, aktifkan subscription (semua paket jika promo), dan buat link 1x pakai
         */
    private function approvePaymentAndInvite(Payment $payment, User $user, string $chatId, string $botToken): void
    {
        // 1. Update status payment ke paid
        $payment->update(['status' => 'paid']);

        // 2. Tentukan daftar paket yang didapat (semua paket aktif jika promo aktif, atau 1 paket saja)
        $isPromoAllAccess = filter_var(Setting::get('promo_all_access', '1'), FILTER_VALIDATE_BOOLEAN);

        if ($isPromoAllAccess) {
            $targetPackages = Package::where('is_active', true)->get();

            if ($payment->package) {
                $targetPackages->push($payment->package);
            }

            $targetPackages = $targetPackages->unique('id')->values();
        } else {
            $targetPackages = collect([$payment->package])->filter()->values();
        }

        // 3. Aktifkan atau perpanjang Subscription (+1 bulan) untuk SETIAP paket yang didapat
        $endDateFormatted = now()->addMonth()->format('d M Y');

        foreach ($targetPackages as $pkg) {
            $activeSub = Subscription::where('user_id', $user->id)
                ->where('package_id', $pkg->id)
                ->where('status', 'active')
                ->whereDate('end_date', '>=', now()->toDateString())
                ->latest('end_date')
                ->first();

            if ($activeSub) {
                $newEndDate = Carbon::parse($activeSub->end_date)->addMonth();
                $activeSub->update([
                    'end_date' => $newEndDate->toDateString(),
                ]);
            } else {
                $newEndDate = now()->addMonth();
                Subscription::create([
                    'user_id' => $user->id,
                    'package_id' => $pkg->id,
                    'status' => 'active',
                    'start_date' => now()->toDateString(),
                    'end_date' => $newEndDate->toDateString(),
                ]);
            }

            if ($pkg->id === $payment->package_id) {
                $endDateFormatted = $newEndDate->format('d M Y');
            }
        }

        // 4. Generate Link 1x Pakai untuk GRUP UTAMA (Komunitas & Forum)
        $mainGroupId = trim((string) Setting::get('main_telegram_group_id', env('MAIN_TELEGRAM_GROUP_ID')));
        $mainGroupLink = null;

        if (!empty($mainGroupId)) {
            $mainInviteResponse = Http::post("https://api.telegram.org/bot{$botToken}/createChatInviteLink", [
                'chat_id' => $mainGroupId,
                'member_limit' => 1,
                'name' => "MAIN - {$payment->invoice_number} - {$user->name}",
            ]);

            if ($mainInviteResponse->successful() && isset($mainInviteResponse->json()['result']['invite_link'])) {
                $mainGroupLink = $mainInviteResponse->json()['result']['invite_link'];
            } else {
                Log::error("Gagal generate invite link Grup Utama: " . $mainInviteResponse->body());
            }
        }

        // 5. Generate Link 1x Pakai untuk setiap Channel Materi
        $generatedLinks = [];
        $processedGroupIds = [];

        foreach ($targetPackages as $pkg) {
            if (empty($pkg->telegram_group_id) || in_array($pkg->telegram_group_id, $processedGroupIds, true)) {
                continue;
            }

            $processedGroupIds[] = $pkg->telegram_group_id;

            $inviteResponse = Http::post("https://api.telegram.org/bot{$botToken}/createChatInviteLink", [
                'chat_id' => $pkg->telegram_group_id,
                'member_limit' => 1,
                'name' => "{$payment->invoice_number} - {$user->name}",
            ]);

            if ($inviteResponse->successful() && isset($inviteResponse->json()['result']['invite_link'])) {
                $generatedLinks[] = [
                    'program_name' => $pkg->name,
                    'url' => $inviteResponse->json()['result']['invite_link'],
                ];
            } else {
                Log::error("Gagal generate invite link untuk paket {$pkg->name}: " . $inviteResponse->body());
            }
        }

        // 6. Susun & kirim pesan balasan ke siswa
        $userName = e($user->name);
        $packageName = e($payment->package->name ?? '-');
        $invoiceNumber = e($payment->invoice_number);

        $message = "✅ <b>PEMBAYARAN TERVERIFIKASI!</b>\n\n"
            . "Terima kasih <b>{$userName}</b>, pembayaran untuk paket <b>{$packageName}</b> telah berhasil dikonfirmasi.\n"
            . "📅 Masa Aktif s/d: <b>{$endDateFormatted}</b>\n\n";

        if ($mainGroupLink) {
            $message .= "💬 <b>Grup Utama Komunitas &amp; Diskusi:</b>\n🔗 {$mainGroupLink}\n\n";
        }

        if (count($generatedLinks) > 0) {
            if ($isPromoAllAccess && count($generatedLinks) > 1) {
                $message .= "🎉 <b>PROMO BULAN PERTAMA AKTIF!</b>\n"
                    . "Selamat! Kamu mendapatkan akses ke <b>SELURUH PROGRAM</b> Ayo Fasih!:\n\n";

                foreach ($generatedLinks as $index => $item) {
                    $num = $index + 1;
                    $progName = e($item['program_name']);
                    $message .= "{$num}. <b>{$progName}</b>\n🔗 {$item['url']}\n\n";
                }
            } else {
                $progName = e($generatedLinks[0]['program_name']);
                $message .= "📚 <b>Channel Materi ({$progName}):</b>\n🔗 {$generatedLinks[0]['url']}\n\n";
            }
        }

        if ($mainGroupLink || count($generatedLinks) > 0) {
            $message .= "⚠️ <i>Setiap link di atas bersifat pribadi dan hanya berlaku untuk 1 kali masuk (otomatis hangus setelah diklik). Jangan bagikan ke orang lain.</i>";
        } else {
            $message .= "⚠️ Admin sedang menyiapkan link akses Anda. Silakan hubungi admin dengan menyertakan nomor invoice <code>{$invoiceNumber}</code>.";
        }

        $this->sendMessage($botToken, $chatId, $message);
    }

    /**
     * Helper kirim pesan DM Telegram dengan format HTML & fallback teks polos
     */
    private function sendMessage(string $botToken, string $chatId, string $text): void
    {
        $response = Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);

        if (!$response->successful()) {
            Log::error('Telegram sendMessage HTML gagal: ' . $response->body());

            // Fallback ke teks polos agar pesan tetap terkirim meski ada karakter spesial
            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => html_entity_decode(strip_tags($text)),
            ]);
        }
    }
}
