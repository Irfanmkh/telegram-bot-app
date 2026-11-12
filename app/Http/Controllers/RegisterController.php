<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        // Ambil SEMUA paket yang berstatus aktif untuk opsi dropdown
        $packages = Package::where('is_active', true)->get();

        return view('regist', compact('packages'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'package_id' => 'required|exists:packages,id',
        ]);

        $package = Package::findOrFail($request->package_id);

        // 1. Buat atau update User
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => bcrypt(Str::random(12)),
                'role' => 'user',
            ]
        );

        // Update no HP jika user sudah ada
        $user->update(['phone' => $request->phone]);

        // 2. Generate 3 digit kode unik yang belum ada di transaksi pending
        do {
            $uniqueCode = rand(100, 999);
            $totalAmount = $package->price + $uniqueCode;
            $exists = Payment::where('total_amount', $totalAmount)
                ->where('status', 'pending')
                ->exists();
        } while ($exists);

        // 3. Buat Record Payment
        $invoiceNumber = 'INV-' . date('YmdHis') . '-' . rand(100, 999);

        $payment = Payment::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'invoice_number' => $invoiceNumber,
            'base_amount' => $package->price,
            'unique_code' => $uniqueCode,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        return redirect()->route('checkout.show', $payment->invoice_number);
    }

    public function show($invoice_number)
    {
        $payment = Payment::with(['user', 'package', ])
            ->where('invoice_number', $invoice_number)
            ->firstOrFail();


        $settings = Setting::pluck('value', 'key')->toArray();


        // Nama Username Bot Telegram Anda (Ganti tanpa @)
        // $botUsername = env('TELEGRAM_BOT_USERNAME', 'MyLearningBot');

        $botUsername = $settings['telegram_bot_username'] ?? 'MyLearningBot';
        $bankInfo = $settings['bank_info'] ?? "";


        // Link Deep Link Telegram dengan parameter Invoice
        $telegramUrl = "https://t.me/{$botUsername}?start={$payment->invoice_number}";

        return view('checkout', compact('payment', 'telegramUrl', 'settings', 'botUsername', 'bankInfo'));
    }
}
