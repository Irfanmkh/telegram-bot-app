<style>
    @keyframes ayofasih-marquee {
        0% {
            transform: translate3d(0, 0, 0);
        }

        100% {
            transform: translate3d(-50%, 0, 0);
        }
    }

    .animate-ayofasih-marquee {
        display: flex !important;
        flex-wrap: nowrap !important;
        width: max-content !important;
        will-change: transform;
        animation: ayofasih-marquee 15s linear infinite;
    }

    @media (hover: hover) {
        .animate-ayofasih-marquee:hover {
            animation-play-state: paused;
        }
    }
</style>
@php
    $isPromoActive = \App\Models\Setting::isPromoAllAccessActive();
    $promoTitle = \App\Models\Setting::get('promo_title', 'Promo Bulan Ini: Beli 1 Kelas Gratis Akses Semua Kelas!');

    $promoSlides = [];
    if ($isPromoActive) {
        $promoSlides[] = [
            'type' => 'promo',
            'text' => $promoTitle,
        ];
    }
    $promoSlides[] = [
        'type' => 'brand',
        'prefix' => 'AyoFasih!',
        'text' => 'Follow media sosial kami untuk tips belajar harian & info promo terbaru!',
    ];
@endphp

<header class="sticky top-0 z-50 w-full">
    <!-- Top Marketing Announcement Bar + Social Media Icons -->
    <div class="bg-brand-600 border-b border-brand-500/40 text-xs text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-9 sm:h-10 flex items-center justify-center gap-3 sm:gap-4">

            <!-- 1. Desktop View: Smooth Vertical Slide Ticker (Centered) -->
            <div id="desktop-promo-slider" class="hidden md:block relative w-full max-w-xl h-6 overflow-hidden">
                @foreach ($promoSlides as $index => $slide)
                    <div
                        class="desktop-promo-slide absolute inset-0 flex items-center justify-center text-center transition-all duration-500 ease-in-out {{ $index === 0 ? 'translate-y-0 opacity-100' : 'translate-y-full opacity-0' }}">
                        @if ($slide['type'] === 'promo')
                            <span class="inline-flex items-center justify-center gap-2 font-medium text-white truncate">
                                <span
                                    class="px-2 py-0.5 rounded-full bg-white/15 text-[10px] font-bold uppercase tracking-wider text-amber-200 shrink-0">
                                    Promo
                                </span>
                                <span class="truncate">{{ $slide['text'] }}</span>
                            </span>
                        @elseif ($slide['type'] === 'brand')
                            <span class="inline-flex items-center justify-center gap-1.5 text-white/95 truncate">
                                <span class="font-bold text-white">{{ $slide['prefix'] }}</span>
                                <span class="truncate">{{ $slide['text'] }}</span>
                            </span>
                        @else
                            <span class="inline-flex items-center justify-center gap-1.5 text-white/95 truncate">
                                <span class="truncate">{{ $slide['text'] }}</span>
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- 2. Mobile View: Marquee Berjalan -->
            <!-- 2. Mobile View: Marquee Berjalan -->
            <div
                class="flex md:hidden relative flex-1 min-w-0 overflow-hidden [mask-image:linear-gradient(to_right,transparent,black_4%,black_96%,transparent)]">
                <div class="animate-ayofasih-marquee items-center">
                    @for ($i = 0; $i < 2; $i++)
                        <div class="flex items-center gap-8 pr-8 shrink-0 whitespace-nowrap">
                            @if ($isPromoActive)
                                <span class="inline-flex items-center gap-1.5 font-medium text-amber-200">
                                    <span>{{ $promoTitle }}</span>
                                </span>
                                <span class="text-white/40">•</span>
                            @endif

                            <span class="inline-flex items-center gap-1.5 text-white/95">
                                <span class="font-bold text-white">AyoFasih!</span>
                                <span>Follow media sosial kami untuk tips belajar harian &amp; info promo
                                    terbaru!</span>
                            </span>

                            <span class="text-white/40">•</span>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Social Media Icons (Instagram & TikTok) -->
            <div class="flex items-center gap-2 sm:gap-2.5 shrink-0 pl-3 border-l border-white/20">
                <span class="hidden sm:inline text-[11px] text-white/80">Ikuti kami:</span>

                <!-- Instagram -->
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                    aria-label="Instagram AyoFasih"
                    class="text-white/90 hover:text-white transition-colors duration-200 p-1 rounded-full hover:bg-white/15">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                    </svg>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" aria-label="TikTok AyoFasih"
                    class="text-white/90 hover:text-white transition-colors duration-200 p-1 rounded-full hover:bg-white/15">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z" />
                    </svg>
                </a>
            </div>

        </div>
    </div>

    <!-- Floating Pill Navbar -->
    <div class="px-4 pt-3 pb-2 flex justify-center relative">
        <nav
            class="flex items-center justify-between md:justify-start w-full md:w-auto border border-slate-700/80 bg-brand-950/85 backdrop-blur-xl px-6 py-3.5 rounded-full text-white text-sm shadow-xl shadow-black/30">

            <!-- Brand Logo -->
            <a href="/" class="flex items-center gap-2.5 group shrink-0">
                <div class="flex items-baseline">
                    <span class="text-lg sm:text-xl font-bold tracking-tight text-white">Ayo</span>
                    <span class="text-lg sm:text-xl font-bold tracking-tight text-brand-500">Fasih!</span>
                </div>
            </a>

            <!-- Desktop Navigation Links (Vertical Slide Hover Effect) -->
            <div class="hidden md:flex items-center gap-7 ml-8 lg:ml-10">
                <a href="/" class="relative overflow-hidden h-5 group flex items-center">
                    <span
                        class="block transition-transform duration-300 group-hover:-translate-y-full {{ request()->is('/') ? 'font-semibold text-white' : 'font-medium text-slate-300' }}">
                        Home
                    </span>
                    <span
                        class="block absolute top-full left-0 transition-transform duration-300 group-hover:-translate-y-full font-semibold text-brand-500">
                        Home
                    </span>
                </a>

                <a href="/about-us" class="relative overflow-hidden h-5 group flex items-center">
                    <span
                        class="block transition-transform duration-300 group-hover:-translate-y-full {{ request()->is('about-us') ? 'font-semibold text-white' : 'font-medium text-slate-300' }}">
                        Tentang Kami
                    </span>
                    <span
                        class="block absolute top-full left-0 transition-transform duration-300 group-hover:-translate-y-full font-semibold text-brand-500">
                        AboutUs
                    </span>
                </a>

                <a href="/visi-misi" class="relative overflow-hidden h-5 group flex items-center">
                    <span
                        class="block transition-transform duration-300 group-hover:-translate-y-full {{ request()->is('visi-misi') ? 'font-semibold text-white' : 'font-medium text-slate-300' }}">
                        Visi Misi
                    </span>
                    <span
                        class="block absolute top-full left-0 transition-transform duration-300 group-hover:-translate-y-full font-semibold text-brand-500">
                        VisiMisi
                    </span>
                </a>
            </div>

            <!-- Right Desktop CTA (Glowing Pill Button) -->
            <div class="hidden md:flex items-center ml-10 lg:ml-14">
                <a href="/register"
                    class="bg-brand-600 hover:bg-brand-500 text-white px-5 py-2 rounded-full text-sm font-semibold shadow-[0px_0px_24px_4px] shadow-brand-500/35 hover:shadow-[0px_0px_30px_10px] hover:shadow-brand-500/55 transition duration-300 shrink-0">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Hamburger Toggle Button (Mobile Only) -->
            <button type="button" id="mobile-menu-btn" aria-controls="mobile-menu" aria-expanded="false"
                aria-label="Buka menu navigasi"
                class="md:hidden inline-flex items-center justify-center p-1.5 rounded-full text-slate-300 hover:text-white hover:bg-slate-800/70 focus:outline-none transition">
                <!-- Icon Bars -->
                <svg id="icon-menu-open" class="w-6 h-6 block" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!-- Icon Close (X) -->
                <svg id="icon-menu-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden absolute top-full left-4 right-4 mt-2 rounded-2xl border border-slate-700/80 bg-brand-950/95 backdrop-blur-xl px-5 py-5 flex-col items-center gap-4 text-sm shadow-2xl">
            <a href="/"
                class="w-full text-center py-2 rounded-xl transition-colors {{ request()->is('/') ? 'font-semibold text-white bg-slate-800/80' : 'font-medium text-slate-300 hover:text-brand-500' }}">
                Home
            </a>

            <a href="/about-us"
                class="w-full text-center py-2 rounded-xl transition-colors {{ request()->is('about-us') ? 'font-semibold text-white bg-slate-800/80' : 'font-medium text-slate-300 hover:text-brand-500' }}">
                Tentang Kami
            </a>

            <a href="/visi-misi"
                class="w-full text-center py-2 rounded-xl transition-colors {{ request()->is('visi-misi') ? 'font-semibold text-white bg-slate-800/80' : 'font-medium text-slate-300 hover:text-brand-500' }}">
                Visi Misi
            </a>

            <div class="w-full pt-2 border-t border-slate-800/80 flex justify-center">
                <a href="/register"
                    class="w-full text-center bg-brand-600 hover:bg-brand-500 text-white font-semibold px-5 py-2.5 rounded-full shadow-[0px_0px_20px_2px] shadow-brand-500/35 transition duration-300">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile Menu Toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-menu-open');
        const iconClose = document.getElementById('icon-menu-close');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex', !isHidden);
                menuBtn.setAttribute('aria-expanded', String(!isHidden));
                iconOpen.classList.toggle('hidden', !isHidden);
                iconClose.classList.toggle('hidden', isHidden);
            });
        }

        // Desktop Promo Vertical Slide Ticker
        const slides = document.querySelectorAll('.desktop-promo-slide');
        const sliderContainer = document.getElementById('desktop-promo-slider');

        if (slides.length > 1 && sliderContainer) {
            let currentSlide = 0;
            let slideInterval;

            const showSlide = (nextIndex) => {
                const exitingSlide = slides[currentSlide];

                slides.forEach((slide, idx) => {
                    slide.classList.remove('translate-y-0', 'opacity-100', '-translate-y-full',
                        'translate-y-full');
                    if (idx === nextIndex) {
                        slide.classList.add('translate-y-0', 'opacity-100');
                    } else if (idx === currentSlide) {
                        slide.classList.add('-translate-y-full', 'opacity-0');
                    } else {
                        slide.classList.add('translate-y-full', 'opacity-0');
                    }
                });

                // Kembalikan posisi slide yang keluar ke bawah secara diam-diam setelah animasi selesai
                setTimeout(() => {
                    if (exitingSlide && exitingSlide !== slides[nextIndex]) {
                        exitingSlide.classList.remove('-translate-y-full');
                        exitingSlide.classList.add('translate-y-full');
                    }
                }, 500);

                currentSlide = nextIndex;
            };

            const startSlider = () => {
                slideInterval = setInterval(() => {
                    const next = (currentSlide + 1) % slides.length;
                    showSlide(next);
                }, 4000);
            };

            const stopSlider = () => clearInterval(slideInterval);

            sliderContainer.addEventListener('mouseenter', stopSlider);
            sliderContainer.addEventListener('mouseleave', startSlider);

            startSlider();
        }
    });
</script>
