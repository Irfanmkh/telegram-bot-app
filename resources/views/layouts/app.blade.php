<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Fasih! - Cepat Fasih, Gak Pake Takut!</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Tailwind CSS CDN (Idealnya gunakan Vite di Laravel: @vite('resources/css/app.css') ) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            950: '#0B0F19',
                            /* Warna background gelap solid, bukan ungu mencolok */
                        }
                    }
                }
            }
        }
    </script>
</head>

<body
    class="bg-brand-950 text-slate-300 font-sans antialiased selection:bg-brand-500 selection:text-white flex flex-col min-h-screen">

    @include('components.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer')
    @php
        $isPromoPopupActive = \App\Models\Setting::isPromoAllAccessActive();
        $popupPromoTitle = \App\Models\Setting::get(
            'promo_title',
            'Promo Bulan Ini: Beli 1 Kelas Gratis Akses Semua Kelas!',
        );
        $popupClassNames = isset($packages)
            ? $packages->pluck('name')->implode(', ')
            : \App\Models\Package::pluck('name')->implode(', ');

        $classList = is_iterable($popupClassNames ?? null)
            ? collect($popupClassNames)->filter()
            : collect(explode(',', (string) ($popupClassNames ?? '')))->map(fn($item) => trim($item))->filter();
    @endphp

    @if ($isPromoPopupActive)
        <!-- Auto Promo Popup Modal -->
        <div id="ayofasih-promo-modal" role="dialog" aria-modal="true" aria-labelledby="promo-modal-title"
            class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/75 backdrop-blur-sm opacity-0 transition-opacity duration-300">

            <!-- Modal Card -->
            <div id="ayofasih-promo-card"
                class="relative w-full max-w-md rounded-2xl bg-slate-900 border border-slate-700/80 shadow-2xl overflow-hidden transform scale-95 transition-all duration-300">

                <!-- Ambient Top Gradient & Glow -->
                <div
                    class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 size-64 bg-brand-600/30 rounded-full blur-3xl">
                </div>


                <!-- Tombol Close (X) -->
                <button type="button" id="promo-modal-close-x" aria-label="Tutup popup promo"
                    class="absolute top-3.5 right-3.5 z-10 p-2 rounded-full bg-slate-800/80 hover:bg-slate-700 text-slate-400 hover:text-white border border-slate-700/60 transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Konten Promo -->
                <div class="relative p-6 sm:p-8 text-center">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1  font-semibold mb-4">

                        <span>Penawaran Terbatas Bulan Ini</span>
                    </div>

                    <h3 id="promo-modal-title" class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        {{ $popupPromoTitle }}
                    </h3>

                    <p class="mt-3 text-sm text-slate-300 leading-relaxed">
                        Cukup daftar dan selesaikan pembayaran untuk <span class="text-white font-semibold">1 paket
                            kelas</span> saja, Anda langsung mendapatkan akses ke seluruh channel materi:
                    </p>

                    @if ($classList->isNotEmpty())
                        <div
                            class="mt-4 p-3.5 rounded-xl bg-slate-950/80 border border-slate-800 text-xs font-medium text-amber-200">
                            @if ($classList->count() > 1)
                                <ul class="space-y-2 text-left">
                                    @foreach ($classList as $className)
                                        <li class="flex items-center gap-2">
                                            -
                                            <span>{{ $className }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-center">
                                    {{ $classList->first() }}
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Tombol Aksi -->
                    <div class="mt-6 flex flex-col gap-2.5">
                        <a href="/register" id="promo-modal-cta"
                            class="w-full inline-flex items-center justify-center bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm py-3.5 px-6 rounded-full shadow-[0px_0px_24px_4px] shadow-brand-500/30 transition duration-300">
                            Klaim Promo &amp; Daftar Sekarang
                        </a>

                        <button type="button" id="promo-modal-dismiss"
                            class="w-full py-2 text-xs font-medium text-slate-400 hover:text-slate-200 transition-colors cursor-pointer">
                            Tutup, lihat-lihat dulu
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('ayofasih-promo-modal');
                const card = document.getElementById('ayofasih-promo-card');
                const btnCloseX = document.getElementById('promo-modal-close-x');
                const btnDismiss = document.getElementById('promo-modal-dismiss');
                const btnCta = document.getElementById('promo-modal-cta');
                const storageKey = 'ayofasih_promo_popup_seen';

                if (!modal || !card) return;

                const openModal = () => {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    requestAnimationFrame(() => {
                        modal.classList.remove('opacity-0');
                        modal.classList.add('opacity-100');
                        card.classList.remove('scale-95');
                        card.classList.add('scale-100');
                    });
                };

                const closeModal = () => {
                    modal.classList.remove('opacity-100');
                    modal.classList.add('opacity-0');
                    card.classList.remove('scale-100');
                    card.classList.add('scale-95');

                    sessionStorage.setItem(storageKey, '1');

                    setTimeout(() => {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    }, 300);
                };

                // Muncul otomatis setelah 0.7 detik jika belum pernah ditutup pada sesi browser ini
                if (!sessionStorage.getItem(storageKey)) {
                    setTimeout(openModal, 700);
                }

                btnCloseX?.addEventListener('click', closeModal);
                btnDismiss?.addEventListener('click', closeModal);
                btnCta?.addEventListener('click', () => sessionStorage.setItem(storageKey, '1'));

                // Tutup saat klik area gelap di luar kartu modal
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        closeModal();
                    }
                });

                // Tutup saat menekan tombol Escape
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                        closeModal();
                    }
                });
            });
        </script>
    @endif

</body>

</html>
