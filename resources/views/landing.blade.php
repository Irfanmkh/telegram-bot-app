@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="relative min-h-screen flex flex-col justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- Left Text Column -->
                <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
                    {{-- <div
                        class="inline-flex items-center gap-2 px-3 py-1 text-brand-400 text-xs font-semibold tracking-wide border border-brand-500/20 bg-brand-500/10">
                        Program Interaktif via Telegram
                    </div> --}}

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-[1.15]">
                        Ayo Fasih, <br>
                        <span class="text-brand-500">Gak Pake Takut!</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-400 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        Kesalahan ucap adalah bagian dari proses menuju fasih, bukan sesuatu yang menakutkan.
                    </p>

                    <div class="pt-4 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="/register"
                            class="bg-white text-brand-950 hover:bg-slate-200 font-semibold py-3 px-7 rounded-md text-center transition-colors">
                            Mulai Sekarang
                        </a>
                        <a href="#materi"
                            class="border border-slate-700 hover:bg-slate-800 text-white font-medium py-3 px-7 rounded-md text-center transition-colors">
                            Lihat Materi
                        </a>
                    </div>
                </div>

                <!-- Right Graphic Visual -->
                <div class="lg:col-span-6 relative flex justify-center items-center min-h-[400px]">
                    <div
                        class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-900/20 via-transparent to-transparent">
                    </div>

                    <div class="relative w-full max-w-[450px]">
                        <!-- Characters Image -->
                        <div class="relative z-10 flex items-end justify-center">
                            <img src="/images/hero.png" alt="Two young people having an English conversation"
                                class="w-full h-auto object-contain">
                        </div>

                        <!-- Speech Bubble 1 -->
                        <div
                            class="absolute -top-12 -left-4 z-20 bg-white text-slate-900 rounded-xl rounded-br-none px-4 py-2 shadow-lg -rotate-3 animate-float border border-slate-200">
                            <p class="text-sm font-semibold">"Bro, that's so lit! 🔥"</p>
                        </div>

                        <!-- Speech Bubble 2 -->
                        <div
                            class="absolute -top-8 -right-4 z-20 bg-brand-600 text-white rounded-xl rounded-bl-none px-4 py-2 shadow-lg rotate-2 animate-float-delayed border border-brand-500">
                            <p class="text-sm font-semibold">"Haha, for real? 😂"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tagline Section (Statement) -->
    <section class="py-16 bg-brand-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <svg class="w-10 h-10 mx-auto text-brand-300/50 mb-4" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
            </svg>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-white leading-snug tracking-tight">
                "Kesalahan ucap adalah bagian dari proses menuju fasih, <span class="text-brand-200">bukan sesuatu yang
                    menakutkan.</span>"
            </h2>
        </div>
    </section>

    <!-- Materi Unggulan Section -->
    <section id="materi" class="py-24 bg-[#0A0E17] border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-white">Materi Unggulan</h2>
                <p class="text-slate-400 mt-4 text-base">Materi praktis yang dirancang khusus untuk penggunaan sehari-hari
                    dan dunia profesional.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-slate-900 border border-slate-800 hover:border-slate-600 rounded-xl p-8 transition-colors">
                    <div
                        class="w-12 h-12 rounded-lg bg-brand-500/10 border border-brand-500/20 flex items-center justify-center mb-6 text-brand-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Slang English</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">Kuasai slang kekinian dan ungkapan kasual yang
                        sering digunakan native speaker dalam percakapan sehari-hari.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-slate-900 border border-slate-800 hover:border-slate-600 rounded-xl p-8 transition-colors">
                    <div
                        class="w-12 h-12 rounded-lg bg-brand-500/10 border border-brand-500/20 flex items-center justify-center mb-6 text-brand-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 2v10" />
                            <path d="M8 6a4 4 0 1 0 8 0" />
                            <path d="M19 10v2a7 7 0 0 1-14 0v-2" />
                            <path d="M12 19v3" />
                            <path d="M8 22h8" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Pronunciation Boost</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">Perbaiki pengucapan kata demi kata agar
                        artikulasi bicaramu lebih jelas, tepat, dan terdengar natural.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-slate-900 border border-slate-800 hover:border-slate-600 rounded-xl p-8 transition-colors">
                    <div
                        class="w-12 h-12 rounded-lg bg-brand-500/10 border border-brand-500/20 flex items-center justify-center mb-6 text-brand-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 18h.01" />
                            <path d="M8 10a4 4 0 0 1 8 0c0 2-4 3-4 5" />
                            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Casual Conversation</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">Latihan percakapan spontan dalam berbagai situasi
                        agar kamu terbiasa merespons dengan cepat dan percaya diri.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Speaking Partner Section -->
    <section id="speaking-partner" class="py-24 bg-brand-950 border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">

                <h2 class="text-3xl font-bold text-white">Global Speaking Partner</h2>
                <p class="text-slate-400 mt-4 text-base">Tingkatkan rasa percaya diri dengan berlatih komunikasi dua arah
                    bersama rekan berbicara kami dari berbagai belahan dunia.</p>
            </div>

            <!-- Grid Cards for Partners -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">

                <!-- Partner 1 -->
                <div
                    class="bg-slate-900 border border-slate-800 hover:border-brand-500/40 rounded-2xl p-8 flex flex-col items-center text-center transition-all duration-300 shadow-sm">
                    <div
                        class="w-20 h-20 rounded-full bg-slate-800 border-2 border-slate-700 flex items-center justify-center mb-5 overflow-hidden">
                        <!-- Gunakan tag <img> jika sudah ada foto: <img src="/images/yahya.jpg" class="w-full h-full object-cover"> -->
                        <span class="text-2xl font-bold text-slate-500">YN</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-1">Yahya Naseer Ba Ali</h3>
                    <div class="inline-flex items-center gap-1.5 mt-2">
                        <img src="/images/saudi.png" alt="Bendera Arab Saudi" class="w-7 h-7 inline-block align-middle" />
                        <span class="text-brand-400 text-sm font-semibold uppercase tracking-wider">Saudi Arabia</span>
                    </div>
                </div>

                <!-- Partner 2 -->
                <div
                    class="bg-slate-900 border border-slate-800 hover:border-brand-500/40 rounded-2xl p-8 flex flex-col items-center text-center transition-all duration-300 shadow-sm">
                    <div
                        class="w-20 h-20 rounded-full bg-slate-800 border-2 border-slate-700 flex items-center justify-center mb-5 overflow-hidden">
                        <!-- Gunakan tag <img> jika sudah ada foto -->
                        <span class="text-2xl font-bold text-slate-500">SA</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-1">Sohail Akhtar</h3>
                    <div class="inline-flex items-center gap-1.5 mt-2">
                        <img src="/images/india.png" alt="Bendera Arab Saudi"
                            class="w-7 h-7 inline-block align-middle" />
                        <span class="text-brand-400 text-sm font-semibold uppercase tracking-wider">India</span>
                    </div>
                </div>

                <!-- Partner 3 -->
                <div
                    class="bg-slate-900 border border-slate-800 hover:border-brand-500/40 rounded-2xl p-8 flex flex-col items-center text-center transition-all duration-300 shadow-sm">
                    <div
                        class="w-20 h-20 rounded-full bg-slate-800 border-2 border-slate-700 flex items-center justify-center mb-5 overflow-hidden">
                        <!-- Gunakan tag <img> jika sudah ada foto -->
                        <span class="text-2xl font-bold text-slate-500">MH</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-1">Muhammad Hassan</h3>
                    <div class="inline-flex items-center gap-1.5 mt-2">
                        <img src="/images/sudan.png" alt="Bendera Sudan" class="w-7 h-7 inline-block align-middle" />
                        <span class="text-brand-400 text-sm font-semibold uppercase tracking-wider">Sudan</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Community Focus Section -->
    <section id="komunitas" class="py-24 bg-[#0A0E17] border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-8 sm:p-12 lg:p-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h2 class="text-3xl font-bold text-white leading-tight">Komunitas Telegram Aktif!</h2>
                        <p class="text-slate-400 text-base leading-relaxed">
                            Belajar Bahasa Inggris tidak cukup hanya teori. Di Telegram group eksklusif kami, kamu bisa
                            latihan daily discussion, tanya jawab materi, serta mendapatkan pengingat otomatis jadwal kelas
                            live.
                        </p>
                        <div>
                            <a href="/register"
                                class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-medium py-3 px-6 rounded-md transition-colors">
                                Gabung Komunitas
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-center w-full">
                        <div
                            class="bg-slate-950 p-6 sm:p-8 rounded-xl border border-slate-800 max-w-sm w-full text-center space-y-4">
                            <!-- Animasi Lottie  -->
                            <div class="flex justify-center h-40">
                                <iframe
                                    src="https://lottie.host/embed/5cc51f53-5845-41ed-9023-0e680d86973f/lDProoe3Fk.lottie"
                                    class="w-full h-full border-0 pointer-events-none" title="Bot Telegram Animation"
                                    scrolling="no"></iframe>
                            </div>
                            <!-- Teks -->
                            <div class="space-y-2 pt-2">
                                <h4 class="text-base font-semibold text-white">Sistem Notifikasi Otomatis</h4>
                                <p class="text-sm text-slate-400 leading-relaxed">
                                    Bot Telegram kami akan mengingatkan jadwal <span class="text-white font-medium">1 jam
                                        sebelum sesi live</span> dimulai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
