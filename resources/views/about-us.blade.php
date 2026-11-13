@extends('layouts.app')

@section('content')
    <!-- Header / Hero Section -->
    <section class="relative pt-24 pb-20 md:pt-32 md:pb-24 overflow-hidden border-b border-slate-800/50">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top,_var(--tw-gradient-stops))] from-slate-900 via-brand-950 to-[#0A0E17] -z-10">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div
                class="inline-flex items-center gap-2 px-3 py-1  text-brand-400 text-xs font-semibold tracking-wide mb-6 uppercase">
                Tentang Kami
            </div>

            <h1
                class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-[1.15] max-w-4xl mx-auto">
                Mendobrak Cara Belajar <br class="hidden sm:block">
                <span class="text-brand-500">Bahasa Inggris Konvensional</span>
            </h1>

            <p class="mt-6 text-base sm:text-lg text-slate-400 max-w-2xl mx-auto leading-relaxed">
                Kami hadir untuk mengubah persepsi bahwa belajar bahasa Inggris itu kaku dan menakutkan, menjadi pengalaman
                yang alami dan penuh percaya diri.
            </p>
        </div>
    </section>


    <!-- Metode Pembelajaran (Highlight) -->
    <section class="py-12 bg-[#0A0E17]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-slate-900 border border-slate-800 rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex-1">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 bg-brand-500/10 border border-brand-500/20 rounded-full text-brand-400 text-xs font-semibold tracking-wide mb-4">
                        Metode Belajar
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">Global Speaking Partner</h3>
                    <p class="text-slate-400 text-base leading-relaxed">
                        Pembelajaran berbasis modul terstruktur yang diimbangi dengan <strong
                            class="text-white font-medium">praktek langsung </strong>. Kamu
                        akan berlatih berinteraksi secara real-time bersama *speaking partner* kami dari <span
                            class="text-slate-200 font-semibold border-b border-slate-600">Arab Saudi, India, dan
                            Sudan</span>.
                    </p>
                </div>
                <!-- Globe / Connect Icon -->
                <div
                    class="flex-shrink-0 w-32 h-32 md:w-40 md:h-40 bg-slate-800 rounded-full flex items-center justify-center border-4 border-slate-900 shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="text-brand-500">
                        <circle cx="12" cy="12" r="10" />
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                        <path d="M2 12h20" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-24 bg-brand-950 border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h3 class="text-xs font-bold tracking-widest text-slate-500 uppercase mb-2">Core Values</h3>
                <h2 class="text-3xl font-bold text-white">Nilai Utama Perusahaan</h2>
                <p class="text-slate-400 mt-4 text-base">Prinsip yang kami pegang teguh untuk menciptakan ekosistem belajar
                    yang ideal.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Value 1 -->
                <div
                    class="bg-slate-900 border border-slate-800 hover:border-slate-700 transition-colors duration-300 rounded-xl p-8 flex flex-col items-start">
                    <h3 class="text-xl font-bold text-white mb-3">Empowerment Over Perfection</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Percaya diri untuk mulai berbicara lebih bernilai
                        daripada menunggu hingga tata bahasa maupun pengucapan menjadi sempurna.</p>
                </div>

                <!-- Value 2 -->
                <div
                    class="bg-slate-900 border border-slate-800 hover:border-slate-700 transition-colors duration-300 rounded-xl p-8 flex flex-col items-start">
                    <h3 class="text-xl font-bold text-white mb-3">Authentic Communication</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Mengutamakan kelancaran (fluency) dan pemahaman
                        konteks dalam dunia nyata dibanding terpaku pada *textbook* semata.</p>
                </div>

                <!-- Value 3 -->
                <div
                    class="bg-slate-900 border border-slate-800 hover:border-slate-700 transition-colors duration-300 rounded-xl p-8 flex flex-col items-start">
                    <h3 class="text-xl font-bold text-white mb-3">Bold & Inclusive</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Terbuka bagi semua tingkat kemampuan dengan gaya
                        penyampaian materi yang selalu segar, ramah, dan adaptif terhadap kebutuhan siswa.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
