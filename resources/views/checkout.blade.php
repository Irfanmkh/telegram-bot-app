@extends('layouts.app')

@section('content')
    <!-- Main Content Checkout -->
    <main class="py-12 px-4 flex-grow flex items-center justify-center">
        <div
            class="max-w-xl w-full bg-slate-900/90 border border-purple-800/50 rounded-3xl p-6 sm:p-10 shadow-2xl backdrop-blur-xl space-y-8">

            <!-- Title & Status Indicator -->
            <div class="text-center space-y-2">
                <div class="inline-flex items-center gap-2 px-3.5 py-1  text-amber-400 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                    Menunggu Pembayaran
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white">Instruksi Pembayaran</h1>
                <p class="text-xs sm:text-sm text-slate-400">
                    Invoice: <span class="font-mono text-purple-300 font-bold">{{ $payment->invoice_number }}</span>
                </p>
            </div>

            <!-- Detail Transaksi & Paket -->
            <div
                class="bg-slate-950/60 border border-purple-900/40 rounded-2xl p-4 text-xs sm:text-sm space-y-2.5 text-slate-300">
                <div class="flex justify-between border-b border-slate-800 pb-2">
                    <span class="text-slate-400">Nama Siswa:</span>
                    <strong class="text-white font-semibold">{{ $payment->user->name }}</strong>
                </div>
                <div class="flex justify-between border-b border-slate-800 pb-2">
                    <span class="text-slate-400">Paket Dipilih:</span>
                    <strong class="text-purple-400 font-bold">{{ $payment->package->name }}</strong>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-400">Harga Paket:</span>
                    <span>Rp {{ number_format($payment->base_amount, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Total Ditransfer & Highlight Kode Unik -->
            <div
                class="bg-gradient-to-br from-purple-950 via-slate-900 to-indigo-950 border-2 border-purple-500/60 rounded-2xl p-6 text-center space-y-3 relative overflow-hidden shadow-inner">
                <div class="text-xs font-bold text-purple-300 uppercase tracking-widest">Total Ditransfer (Presisi)
                </div>
                <div class="text-3xl sm:text-4xl font-extrabold text-white font-mono tracking-tight">
                    Rp {{ number_format($payment->total_amount, 0, ',', '.') }}
                </div>
                <div
                    class="inline-block bg-purple-900/80 border border-purple-400/40 px-3 py-1 rounded-lg text-xs text-purple-200">
                    3 Digit Kode Unik: <strong
                        class="text-yellow-300 font-mono text-sm">{{ $payment->unique_code }}</strong>
                </div>
                <p class="text-[11px] text-amber-300/90 leading-tight">
                    ⚠️ <strong>PENTING:</strong> Mohon transfer persis hingga 3 digit terakhir agar sistem OCR bot
                    Telegram kami dapat memverifikasi pembayaran secara otomatis.
                </p>
            </div>

            <!-- Rekening Tujuan Transfer -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Rekening Tujuan Transfer:
                    </h3>
                    <span class="text-[11px] text-purple-400">Klik tombol untuk menyalin</span>
                </div>

                @php
                    // Mengubah string $bankInfo per baris jika diinputkan beberapa rekening (BCA, Mandiri, dll)
                    $bankLines = array_filter(explode("\n", str_replace("\r", '', $bankInfo)));
                @endphp

                <div class="space-y-3">
                    @foreach ($bankLines as $index => $line)
                        @php
                            // Mengambil angka rekening (digit saja) untuk fungsi copy
                            preg_match('/[0-9]{5,20}/', $line, $matches);
                            $accountNumber = $matches[0] ?? '';
                        @endphp

                        <div
                            class="bg-slate-950/80 border border-purple-900/50 hover:border-purple-500/50 rounded-2xl p-4 transition flex items-center justify-between gap-4">
                            <div class="space-y-1">
                                <p class="text-sm font-semibold text-white tracking-wide">
                                    {{ $line }}
                                </p>
                            </div>

                            @if ($accountNumber)
                                <button type="button" onclick="copyAccount('{{ $accountNumber }}', this)"
                                    class="inline-flex items-center gap-1.5 bg-purple-900/40 hover:bg-purple-800/60 border border-purple-500/30 text-purple-200 text-xs font-bold py-2 px-3.5 rounded-xl transition active:scale-95 shrink-0">
                                    <svg class="w-4 h-4 text-purple-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 002-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Salin</span>
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Petunjuk & Tombol Konfirmasi Telegram -->
            <div class="border-t border-purple-900/30 pt-6 space-y-4">
                <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Langkah Selanjutnya:</h3>
                <ol class="text-xs sm:text-sm text-slate-300 space-y-2 list-decimal list-inside leading-relaxed">
                    <li>Transfer sesuai dengan nominal persis di atas.</li>
                    <li>Simpan / <em>screenshot</em> bukti transfer transaksi.</li>
                    <li>Klik tombol di bawah untuk membuka Bot Telegram.</li>
                    <li>Tekan <strong>Start</strong> di Telegram lalu kirimkan foto bukti transfer.</li>
                </ol>

                <div class="pt-2">
                    <a href="{{ $telegramUrl }}" target="_blank"
                        class="w-full inline-flex items-center justify-center gap-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-extrabold py-4 px-6 rounded-2xl shadow-lg shadow-purple-900/50 transition duration-200 text-base tracking-wide uppercase hover:scale-[1.02] active:scale-[0.98]">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 0C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0zm5.56 8.16l-2.02 9.52c-.15.68-.56.84-1.13.53l-3.1-2.28-1.5 1.44c-.17.17-.31.31-.63.31l.22-3.16 5.76-5.2c.25-.22-.05-.34-.39-.12l-7.12 4.48-3.07-.96c-.67-.21-.68-.67.14-.99l12.01-4.63c.56-.2 1.05.14.83.96z" />
                        </svg>
                        Konfirmasi Via Bot Telegram
                    </a>
                    {{-- <p class="text-[11px] text-center text-slate-500 mt-2">
                        Membuka deep link Telegram: <span class="font-mono text-slate-400">{{ $telegramUrl }}</span>
                    </p> --}}
                </div>
            </div>

        </div>
    </main>
@endsection



<!-- Script Javascript Clipboard Copy -->
<script>
    function copyAccount(text, btnElement) {
        navigator.clipboard.writeText(text).then(() => {
            const originalHTML = btnElement.innerHTML;

            // Ubah tampilan tombol saat berhasil disalin
            btnElement.innerHTML = `
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-emerald-400 font-bold">Tercopy!</span>
            `;
            btnElement.classList.add('border-emerald-500/50', 'bg-emerald-950/40');

            // Kembalikan ke tombol semula setelah 2 detik
            setTimeout(() => {
                btnElement.innerHTML = originalHTML;
                btnElement.classList.remove('border-emerald-500/50', 'bg-emerald-950/40');
            }, 2000);
        }).catch(err => {
            alert('Gagal menyalin nomor rekening');
        });
    }
</script>
