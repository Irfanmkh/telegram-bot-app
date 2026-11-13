@extends('layouts.app')

@section('content')
    <!-- HEADER: Minimalist Title -->
    <section class="pt-24 pb-12 bg-[#0A0E17]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-white mb-4">
                Visi & Misi Kami
            </h1>
            {{-- <p class="text-base sm:text-lg text-slate-400 max-w-2xl mx-auto leading-relaxed">
                Tujuan besar yang memandu setiap langkah kami dalam merevolusi cara belajar bahasa Inggris.
            </p> --}}
        </div>
    </section>

    <!-- SECTION VISI: Hero Statement Focus -->
    <section class="py-20 relative overflow-hidden bg-[#0A0E17]">
        <!-- Subtle radial glow background -->
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-900/10 via-transparent to-transparent">
        </div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 bg-brand-500/10 text-brand-400 text-xs font-bold tracking-widest uppercase mb-10">
                Visi
            </div>

            <!-- Large, bold, and elegant typography -->
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-[1.3] tracking-tight">
                Menjadi platform pendidikan bahasa Inggris modern terdepan yang menciptakan lingkungan belajar inklusif,
                meruntuhkan rasa takut salah, serta mencetak <span class="text-brand-400">generasi pembicara yang percaya
                    diri, luwes, dan berwawasan global.</span>
            </h2>
        </div>
    </section>

    <!-- SECTION MISI: Modern Grid / Bento Box Style -->
    <section class="py-24 bg-brand-950 border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 bg-brand-500/10 text-brand-400 text-xs font-bold tracking-widest uppercase mb-10">
                    Misi
                </div>
            </div>

            <!-- 2x2 Elegant Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                <!-- Card Misi 01 -->
                <div
                    class="relative bg-slate-900 border border-slate-800 rounded-3xl p-8 lg:p-12 hover:border-brand-500/40 transition-colors duration-300 overflow-hidden group shadow-md">
                    <!-- Giant Watermark Number -->
                    <div
                        class="absolute -right-6 -bottom-8 text-[160px] leading-none font-black text-slate-800/30 group-hover:text-brand-500/5 transition-colors duration-500 pointer-events-none select-none">
                        01
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-xl sm:text-2xl font-bold text-white mb-4">Fear-Free Learning</h4>
                        <p class="text-slate-400 text-base leading-relaxed">
                            Membangun ruang belajar yang suportif di mana pembelajar bebas mengekspresikan diri tanpa takut
                            dihakimi atas kesalahan tata bahasa maupun pelafalan.
                        </p>
                    </div>
                </div>

                <!-- Card Misi 02 -->
                <div
                    class="relative bg-slate-900 border border-slate-800 rounded-3xl p-8 lg:p-12 hover:border-brand-500/40 transition-colors duration-300 overflow-hidden group shadow-md">
                    <div
                        class="absolute -right-6 -bottom-8 text-[160px] leading-none font-black text-slate-800/30 group-hover:text-brand-500/5 transition-colors duration-500 pointer-events-none select-none">
                        02
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-xl sm:text-2xl font-bold text-white mb-4">Practical & Real-World</h4>
                        <p class="text-slate-400 text-base leading-relaxed">
                            Menyajikan kurikulum yang relevan dengan tren komunikasi global dan percakapan sehari-hari,
                            bukan sekadar teori buku teks yang kaku.
                        </p>
                    </div>
                </div>

                <!-- Card Misi 03 -->
                <div
                    class="relative bg-slate-900 border border-slate-800 rounded-3xl p-8 lg:p-12 hover:border-brand-500/40 transition-colors duration-300 overflow-hidden group shadow-md">
                    <div
                        class="absolute -right-6 -bottom-8 text-[160px] leading-none font-black text-slate-800/30 group-hover:text-brand-500/5 transition-colors duration-500 pointer-events-none select-none">
                        03
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-xl sm:text-2xl font-bold text-white mb-4">International Standard</h4>
                        <p class="text-slate-400 text-base leading-relaxed">
                            Menghubungkan pembelajar lokal dengan teknik pelafalan (pronunciation) berstandar internasional
                            secara mudah dan menyenangkan.
                        </p>
                    </div>
                </div>

                <!-- Card Misi 04 -->
                <div
                    class="relative bg-slate-900 border border-slate-800 rounded-3xl p-8 lg:p-12 hover:border-brand-500/40 transition-colors duration-300 overflow-hidden group shadow-md">
                    <div
                        class="absolute -right-6 -bottom-8 text-[160px] leading-none font-black text-slate-800/30 group-hover:text-brand-500/5 transition-colors duration-500 pointer-events-none select-none">
                        04
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-xl sm:text-2xl font-bold text-white mb-4">Community-Driven Growth</h4>
                        <p class="text-slate-400 text-base leading-relaxed">
                            Mengembangkan komunitas digital interaktif berbasis micro-learning dan gamifikasi untuk
                            mendukung konsistensi dalam belajar.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
