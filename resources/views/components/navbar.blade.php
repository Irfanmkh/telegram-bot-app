<nav class="sticky top-0 z-50 bg-brand-950/90 backdrop-blur-xl border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-[72px] sm:h-[76px] flex items-center justify-between gap-2">

            <!-- Brand Logo -->
            <a href="/" class="flex items-center gap-2.5 group shrink-0">
                <div class="flex items-baseline">
                    <span class="text-lg sm:text-xl font-bold tracking-tight text-white">Ayo</span>
                    <span class="text-lg sm:text-xl font-bold tracking-tight text-brand-500">Fasih!</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center gap-1 p-1.5 bg-slate-900/60 border border-slate-800/80 rounded-full">
                <a href="/"
                    class="px-5 py-2 rounded-full text-sm transition-all duration-300 {{ request()->is('/') ? 'font-semibold text-white bg-slate-800' : 'font-medium text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    Home
                </a>

                <a href="/about-us"
                    class="px-5 py-2 rounded-full text-sm transition-all duration-300 {{ request()->is('about-us') ? 'font-semibold text-white bg-slate-800' : 'font-medium text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    Tentang Kami
                </a>

                <a href="/visi-misi"
                    class="px-5 py-2 rounded-full text-sm transition-all duration-300 {{ request()->is('visi-misi') ? 'font-semibold text-white bg-slate-800' : 'font-medium text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    Visi Misi
                </a>
            </div>

            <!-- Right Actions: CTA & Mobile Menu Button -->
            <div class="flex items-center gap-2 sm:gap-3">
                <a href="/register"
                    class="group inline-flex items-center justify-center bg-brand-600 hover:bg-brand-500 text-white text-xs sm:text-sm font-semibold px-3.5 py-2 sm:px-5 sm:py-2.5 rounded-full transition-all duration-300 shadow-lg shadow-brand-600/10 hover:shadow-brand-600/20 shrink-0">
                    <span>Daftar Sekarang</span>
                </a>

                <!-- Hamburger Toggle Button (Mobile Only) -->
                <button type="button"
                    id="mobile-menu-btn"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    aria-label="Buka menu navigasi"
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/70 border border-slate-800/80 focus:outline-none transition">
                    <!-- Icon Bars -->
                    <svg id="icon-menu-open" class="w-5 h-5 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon Close (X) -->
                    <svg id="icon-menu-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-slate-800/80 bg-brand-950/95 backdrop-blur-xl">
        <div class="px-4 pt-3 pb-5 space-y-1.5">
            <a href="/"
                class="block px-4 py-3 rounded-xl text-sm transition-all {{ request()->is('/') ? 'font-semibold text-white bg-slate-800/90 border border-slate-700/60' : 'font-medium text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                Home
            </a>

            <a href="/about-us"
                class="block px-4 py-3 rounded-xl text-sm transition-all {{ request()->is('about-us') ? 'font-semibold text-white bg-slate-800/90 border border-slate-700/60' : 'font-medium text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                Tentang Kami
            </a>

            <a href="/visi-misi"
                class="block px-4 py-3 rounded-xl text-sm transition-all {{ request()->is('visi-misi') ? 'font-semibold text-white bg-slate-800/90 border border-slate-700/60' : 'font-medium text-slate-400 hover:text-white hover:bg-slate-800/50' }}">
                Visi Misi
            </a>

            <div class="pt-3 mt-2 border-t border-slate-800/80">
                <a href="/register"
                    class="flex items-center justify-center w-full bg-brand-600 hover:bg-brand-500 text-white text-sm font-semibold px-5 py-3 rounded-xl transition-all shadow-lg shadow-brand-600/20">
                    Daftar Sekarang &rarr;
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-menu-open');
        const iconClose = document.getElementById('icon-menu-close');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.toggle('hidden');
                menuBtn.setAttribute('aria-expanded', String(!isHidden));
                iconOpen.classList.toggle('hidden', !isHidden);
                iconClose.classList.toggle('hidden', isHidden);
            });
        }
    });
</script>
