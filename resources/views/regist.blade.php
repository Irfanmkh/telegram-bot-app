@extends('layouts.app')

@section('content')
    <!-- Form Registrasi -->
    <section id="register"
        class="relative overflow-hidden bg-[#0A0E17] border-t border-slate-800/50 py-20 px-4 sm:px-6 lg:px-8">

        <!-- Ambient Background Glow -->
        <div
            class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 size-[32rem] bg-brand-500/15 rounded-full blur-[180px]">
        </div>

        <div
            class="relative z-10 max-w-6xl mx-auto flex flex-col lg:flex-row items-center lg:items-start justify-between gap-12 lg:gap-16">

            <!-- Kolom Kiri: Heading & Informasi Brand -->
            <div class="text-center lg:text-left lg:mt-10 max-w-lg">

                @php
                    $isPromoActive = \App\Models\Setting::isPromoAllAccessActive();
                    $allClassNames = $packages->pluck('name')->implode(', ');
                    $promoTitle = \App\Models\Setting::get(
                        'promo_title',
                        'Promo Bulan Ini: Beli 1 Kelas Gratis Akses Semua Kelas!',
                    );
                @endphp


                <h2
                    class="font-bold text-3xl sm:text-4xl lg:text-5xl leading-tight bg-gradient-to-r from-white to-slate-400 bg-clip-text text-transparent mt-5">
                    Formulir Pendaftaran
                </h2>

                <p class="text-sm sm:text-base leading-relaxed text-slate-400 max-w-md mt-4 mx-auto lg:mx-0">
                    Isi data dirimu di bawah ini untuk memulai langkah belajar di Ayo Fasih!
                </p>

                @if ($isPromoActive)
                    <div class="mt-6 p-4 rounded-xl  text-left backdrop-blur-sm">
                        <div class="flex items-start gap-3">
                            <span class="text-lg leading-none mt-0.5 shrink-0">🎁</span>
                            <div class="space-y-1">

                                <p class="text-sm font-semibold text-amber-200 leading-snug">
                                    {{ $promoTitle }}
                                </p>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    Cukup daftar dan bayar <span class="text-white font-medium">1 paket kelas</span> apa
                                    saja, Anda otomatis mendapatkan akses ke seluruh channel materi (<span
                                        class="text-white font-medium">{{ $allClassNames }}</span>).
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Kolom Kanan: Card Form Translucent -->
            <div
                class="w-full max-w-xl mx-auto lg:mx-0 bg-slate-900/60 backdrop-blur-md border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl">
                <form action="{{ route('checkout.process') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Nama Lengkap -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-300">Nama Lengkap</label>
                            <input type="text" name="name" required
                                class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition text-sm"
                                placeholder="Budi Pratama">
                        </div>

                        <!-- No WhatsApp/Telegram -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-300">Nomor Telegram</label>
                            <input type="number" name="phone" required
                                class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition text-sm"
                                placeholder="081234567890">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-slate-300">Alamat Email</label>
                        <input type="email" name="email" required
                            class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition text-sm"
                            placeholder="budi@email.com">
                    </div>

                    <!-- Dropdown Pilih Paket (Custom UI) -->
                    @php
                        $isPromoActive = \App\Models\Setting::isPromoAllAccessActive();
                        $allClassNames = $packages->pluck('name')->implode(', ');
                        $promoTitle = \App\Models\Setting::get(
                            'promo_title',
                            'Promo Bulan Ini: Beli 1 Kelas Gratis Akses Semua Kelas!',
                        );
                    @endphp

                    <div class="space-y-2 relative" id="package-dropdown-wrapper">
                        <label class="block text-sm font-medium text-slate-300">Pilih Paket Pembelajaran</label>

                        {{-- Select asli disembunyikan agar validasi HTML5 required & submit form tetap normal --}}
                        <select name="package_id" id="real-package-select" required class="sr-only" tabindex="-1">
                            <option value="" disabled selected>-- Pilih Paket Pembelajaran --</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                            @endforeach
                        </select>

                        {{-- Tombol Trigger Dropdown --}}
                        <button type="button" id="package-dropdown-btn"
                            class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-4 py-3 text-left text-white focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition text-sm flex items-center justify-between gap-2">
                            <span id="package-dropdown-label" class="text-slate-400 truncate">-- Pilih Paket Pembelajaran
                                --</span>
                            <svg id="package-dropdown-arrow"
                                class="h-4 w-4 text-slate-400 shrink-0 transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Panel Menu Saat Dropdown Dibuka --}}
                        <div id="package-dropdown-menu"
                            class="hidden absolute z-50 left-0 right-0 mt-1 bg-slate-900 border border-slate-700 rounded-lg shadow-2xl overflow-hidden">

                            {{-- Banner Info Promo di Bagian Atas Dropdown --}}
                            @if ($isPromoActive)
                                <div
                                    class="bg-gradient-to-r from-amber-500/20 via-amber-500/15 to-yellow-500/10 border-b border-amber-500/30 px-4 py-3">
                                    <div class="flex items-start gap-2.5">
                                        <span class="text-base leading-none mt-0.5">🎁</span>
                                        <div class="text-xs leading-relaxed">
                                            <p class="font-semibold text-amber-300">{{ $promoTitle }}</p>
                                            <p class="text-slate-300 mt-0.5">
                                                Cukup pilih 1 kelas di bawah, otomatis dapat akses ke semua channel:
                                                <span class="text-white font-medium">{{ $allClassNames }}</span>.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Daftar Pilihan Paket --}}
                            <div class="max-h-60 overflow-y-auto divide-y divide-slate-800">
                                @foreach ($packages as $package)
                                    <button type="button" data-value="{{ $package->id }}"
                                        data-label="{{ $package->name }} - Rp {{ number_format($package->price, 0, ',', '.') }}"
                                        class="package-option w-full text-left px-4 py-3 hover:bg-slate-800/90 transition-colors flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                        <span class="text-sm font-medium text-white">{{ $package->name }}</span>
                                        <div class="text-xs sm:text-right">
                                            <span class="font-semibold text-emerald-400">Rp
                                                {{ number_format($package->price, 0, ',', '.') }}</span>
                                            @if ($package->original_price > $package->price)
                                                <span class="text-slate-400 line-through ml-1.5">Rp
                                                    {{ number_format($package->original_price, 0, ',', '.') }}</span>
                                            @endif
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Footer Form: Keterangan & Tombol Submit Sejajar -->
                    <div class="pt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <p class="text-xs text-slate-400 leading-relaxed sm:max-w-[260px]">
                            Setelah klik tombol di samping, Anda akan mendapatkan rincian pembayaran unik dan diarahkan ke
                            <span class="text-slate-200">Bot Telegram</span> untuk verifikasi otomatis.
                        </p>
                        <button type="submit"
                            class="w-full sm:w-auto shrink-0 bg-white text-slate-900 hover:bg-slate-200 font-semibold px-8 py-3.5 rounded-full transition-colors text-sm cursor-pointer">
                            Lanjut ke Pembayaran
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('package-dropdown-wrapper');
            const btn = document.getElementById('package-dropdown-btn');
            const menu = document.getElementById('package-dropdown-menu');
            const arrow = document.getElementById('package-dropdown-arrow');
            const label = document.getElementById('package-dropdown-label');
            const realSelect = document.getElementById('real-package-select');
            const options = document.querySelectorAll('.package-option');

            btn.addEventListener('click', function() {
                const isHidden = menu.classList.contains('hidden');
                menu.classList.toggle('hidden', !isHidden);
                arrow.classList.toggle('rotate-180', isHidden);
            });

            options.forEach(option => {
                option.addEventListener('click', function() {
                    const val = this.getAttribute('data-value');
                    const text = this.getAttribute('data-label');

                    realSelect.value = val;
                    label.textContent = text;
                    label.classList.remove('text-slate-400');
                    label.classList.add('text-white');

                    options.forEach(opt => opt.classList.remove('bg-slate-800'));
                    this.classList.add('bg-slate-800');

                    menu.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                });
            });

            // Tutup dropdown jika klik di luar area
            document.addEventListener('click', function(e) {
                if (!wrapper.contains(e.target)) {
                    menu.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                }
            });
        });
    </script>
@endsection
