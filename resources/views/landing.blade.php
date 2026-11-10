<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Fasih! - Cepat Fasih, Gak Pake Takut!</title>

    <!-- Google Fonts & Tailwind CSS CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
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
                            50: '#f5f3ff',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            900: '#4c1d95',
                            950: '#0f0728',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(-6deg);
            }

            50% {
                transform: translateY(-12px) rotate(-3deg);
            }
        }

        @keyframes float-delayed {

            0%,
            100% {
                transform: translateY(0) rotate(3deg);
            }

            50% {
                transform: translateY(-10px) rotate(6deg);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 4.5s ease-in-out infinite;
        }

        @media (prefers-reduced-motion: reduce) {

            .animate-float,
            .animate-float-delayed {
                animation: none;
            }
        }
    </style>
</head>

<body class="bg-brand-950 text-slate-100 font-sans selection:bg-purple-500 selection:text-white">

    <!-- Navbar (Tanpa Tombol Login, Hanya Navigasi & Button Daftar) -->
    <nav class="sticky top-0 z-50 bg-brand-950/80 backdrop-blur-md border-b border-purple-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="text-2xl font-extrabold tracking-tight flex items-center gap-1">
                <span class="text-white">Ayo</span>
                <span class="text-purple-400">Fasih!</span>
            </a>

            <!-- Menu Links -->
            <div class="hidden md:flex items-center space-x-8 text-sm font-semibold text-slate-300">
                <a href="#hero" class="hover:text-purple-400 transition">HOME</a>
                <a href="#materi" class="hover:text-purple-400 transition">MATERI</a>
                <a href="#komunitas" class="hover:text-purple-400 transition">JOIN COMMUNITY</a>
            </div>

            <!-- CTA Button -->
            <div>
                <a href="#register"
                    class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-sm font-bold py-2.5 px-6 rounded-full shadow-lg shadow-purple-900/40 transition-all hover:scale-105 active:scale-95 inline-block">
                    DAFTAR SEKARANG
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative pt-12 pb-20 md:pt-20 md:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- Left Text Column -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5  text-purple-300 text-xs font-semibold tracking-wide uppercase">

                        Program Pembelajaran Interaktif via Telegram
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.1]">
                        CEPAT FASIH, <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400">
                            GAK PAKE TAKUT!
                        </span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Kuasai <strong class="text-white">Slang, Pronunciation, & Real-World English</strong> tanpa
                        bikin bosan. Kamu akan dipandu dengan metode praktis langsung ke studi kasus nyata agar percaya
                        diri berkomunikasi global.
                    </p>

                    <div class="pt-4 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#register"
                            class="bg-white text-brand-950 hover:bg-slate-100 font-extrabold py-4 px-8 rounded-full text-center shadow-xl transition hover:scale-105">
                            MULAI SEKARANG
                        </a>
                        <a href="#materi"
                            class="border border-purple-500/40 hover:bg-purple-900/20 text-slate-200 font-semibold py-4 px-8 rounded-full text-center transition">
                            Lihat Materi
                        </a>
                    </div>
                </div>

                <!-- Right Graphic Visual -->
                <!-- Right Conversation Visual -->
                <div class="lg:col-span-5 relative flex justify-center items-center min-h-[420px] md:min-h-[520px]">

                    <!-- Main Glow -->
                    <div
                        class="absolute w-[300px] h-[300px] md:w-[430px] md:h-[430px]
                    bg-gradient-to-tr from-purple-600 to-indigo-600
                    rounded-full blur-[90px] opacity-40">
                    </div>

                    <!-- Conversation Card -->
                    <div class="relative w-full max-w-[500px] aspect-[4/5] md:aspect-[5/5]">

                        <!-- Background Panel -->
                        <div
                            class="absolute inset-x-5 top-16 bottom-4
                        rounded-[40px] bg-gradient-to-br from-purple-600/40
                        via-indigo-600/30 to-pink-500/20
                        border border-purple-300/20
                        backdrop-blur-sm rotate-[-5deg]">
                        </div>

                        <!-- Decorative Circle -->
                        <div
                            class="absolute top-24 right-5 w-20 h-20 rounded-full
                        border border-purple-300/30">
                        </div>

                        <div
                            class="absolute bottom-12 left-0 w-14 h-14 rounded-full
                        bg-pink-500/20 blur-xl">
                        </div>

                        <!-- Speech Bubble 1 -->
                        <!-- Speech Bubble 1 -->
                        <div
                            class="absolute top-12 left-0  z-20
bg-white text-slate-900 rounded-2xl rounded-br-none
px-4 py-3 shadow-xl -rotate-6 animate-float">

                            <p class="text-xs md:text-sm font-bold">
                                "Bro, that's so lit! 🔥"
                            </p>

                            <span class="absolute -bottom-2 right-0 w-4 h-4
    bg-white rotate-45"></span>
                        </div>

                        <!-- Speech Bubble 2 -->
                        <div
                            class="absolute top-12 right-0 z-20
bg-pink-500
text-white rounded-2xl rounded-bl-none
px-4 py-3 shadow-xl rotate-3 animate-float-delayed">

                            <p class="text-xs md:text-sm font-bold">
                                "Haha, for real? 😂"
                            </p>

                            <span class="absolute -bottom-2 left-0 w-4 h-4
    bg-pink-500 rotate-45"></span>
                        </div>

                        <!-- Characters Image -->
                        <div class="absolute inset-0 flex items-end justify-center z-10">

                            <img src="/images/hero.png" alt="Two young people having an English slang conversation"
                                class="w-full h-full object-contain object-bottom drop-shadow-2xl -translate-y-12 md:-translate-y-5">

                        </div>



                    </div>

                </div>
            </div>
    </section>

    <!-- Materi Unggulan Section -->
    <section id="materi" class="py-20 bg-slate-950/60 border-t border-purple-900/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white">Materi Unggulan</h2>
                <p class="text-slate-400 mt-3 text-sm sm:text-base">Materi praktis yang dirancang khusus untuk
                    penggunaan sehari-hari dan dunia profesional.</p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Card 1 -->
                <div
                    class="bg-gradient-to-b from-purple-900/20 to-slate-900/80
        border border-white/10 hover:border-purple-500/40
        rounded-2xl p-7 transition-all duration-300 group">

                    <div
                        class="w-12 h-12 rounded-xl bg-purple-500/10
            border border-purple-400/20 flex items-center justify-center
            mb-6 text-purple-400 group-hover:bg-purple-500/20 transition-colors">

                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-white mb-3 tracking-tight">
                        SLANG ENGLISH
                    </h3>

                    <p class="text-slate-400 text-sm leading-relaxed mb-7">
                        Kuasai slang kekinian dan ungkapan kasual yang sering digunakan
                        native speaker dalam percakapan sehari-hari.
                    </p>

                    <a href="#register"
                        class="text-purple-400 font-semibold text-sm inline-flex items-center gap-2
            group-hover:text-purple-300 transition-colors">
                        PELAJARI
                    </a>
                </div>


                <!-- Card 2 -->
                <div
                    class="bg-gradient-to-b from-purple-900/20 to-slate-900/80
        border border-white/10 hover:border-purple-500/40
        rounded-2xl p-7 transition-all duration-300 group">

                    <div
                        class="w-12 h-12 rounded-xl bg-purple-500/10
            border border-purple-400/20 flex items-center justify-center
            mb-6 text-purple-400 group-hover:bg-purple-500/20 transition-colors">

                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 2v10" />
                            <path d="M8 6a4 4 0 1 0 8 0" />
                            <path d="M19 10v2a7 7 0 0 1-14 0v-2" />
                            <path d="M12 19v3" />
                            <path d="M8 22h8" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-white mb-3 tracking-tight">
                        PRONUNCIATION BOOST
                    </h3>

                    <p class="text-slate-400 text-sm leading-relaxed mb-7">
                        Perbaiki pengucapan kata demi kata agar artikulasi bicaramu
                        lebih jelas, tepat, dan terdengar natural.
                    </p>

                    <a href="#register"
                        class="text-purple-400 font-semibold text-sm inline-flex items-center gap-2
            group-hover:text-purple-300 transition-colors">
                        PELAJARI
                    </a>
                </div>


                <!-- Card 3 -->
                <div
                    class="bg-gradient-to-b from-purple-900/20 to-slate-900/80
        border border-white/10 hover:border-purple-500/40
        rounded-2xl p-7 transition-all duration-300 group">

                    <div
                        class="w-12 h-12 rounded-xl bg-purple-500/10
            border border-purple-400/20 flex items-center justify-center
            mb-6 text-purple-400 group-hover:bg-purple-500/20 transition-colors">

                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 18h.01" />
                            <path d="M8 10a4 4 0 0 1 8 0c0 2-4 3-4 5" />
                            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-white mb-3 tracking-tight">
                        CASUAL CONVERSATION
                    </h3>

                    <p class="text-slate-400 text-sm leading-relaxed mb-7">
                        Latihan percakapan spontan dalam berbagai situasi agar kamu
                        terbiasa merespons dengan cepat dan percaya diri.
                    </p>

                    <a href="#register"
                        class="text-purple-400 font-semibold text-sm inline-flex items-center gap-2
            group-hover:text-purple-300 transition-colors">
                        PELAJARI
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- Community Focus Section -->
    <section id="komunitas" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-gradient-to-r from-purple-950 via-slate-900 to-purple-900 rounded-3xl border border-purple-800/40 p-8 sm:p-12 md:p-16 relative overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="space-y-6">
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">KOMUNITAS TELEGRAM
                            AKTIF!</h2>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                            Belajar Bahasa Inggris tidak cukup hanya teori. Di Telegram group eksklusif kami, kamu bisa
                            latihan daily discussion, tanya jawab materi, serta mendapatkan pengingat otomatis jadwal
                            kelas besar.
                        </p>
                        <div>
                            <a href="#register"
                                class="inline-block bg-purple-600 hover:bg-purple-500 text-white font-bold py-3.5 px-8 rounded-full shadow-lg transition">
                                GABUNG KOMUNITAS
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-center w-full">
                        <div
                            class="bg-gradient-to-b from-purple-900/40 via-slate-900/80 to-purple-950/60 p-6 sm:p-7 rounded-3xl border border-purple-500/30 backdrop-blur-md max-w-sm w-full text-center space-y-4 shadow-xl shadow-purple-950/50 hover:border-purple-500/50 transition-all duration-300 group">

                            <!-- Animasi Lottie  -->
                            <div class="flex justify-center">
                                <iframe
                                    src="https://lottie.host/embed/5cc51f53-5845-41ed-9023-0e680d86973f/lDProoe3Fk.lottie"
                                    class="w-full h-full border-0 pointer-events-none relative z-10"
                                    title="Bot Telegram Animation" scrolling="no">
                                </iframe>
                            </div>

                            <!-- Teks -->
                            <div class="space-y-2">
                                <h4 class="text-base sm:text-lg font-extrabold text-white tracking-wide">
                                    Sistem Notifikasi Otomatis
                                </h4>
                                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                    Bot Telegram kami akan mengingatkan jadwal <span
                                        class="text-purple-300 font-semibold">1 jam sebelum sesi live</span> dimulai,
                                    supaya kamu tidak
                                    <span
                                        class="inline-block  text-purple-200 font-extrabold text-xs tracking-wider uppercase ml-0.5">
                                        Ketinggalan
                                    </span>.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Registrasi & Pendaftaran Paket (Core Component) -->
    <section id="register" class="py-20 bg-slate-950 border-t border-purple-900/30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white">Formulir Pendaftaran</h2>
                <p class="text-slate-400 mt-2 text-sm">Isi data dirimu di bawah ini untuk memulai langkah belajar di
                    Ayo
                    Fasih!</p>
            </div>

            <div
                class="bg-slate-900/90 border border-purple-800/50 rounded-3xl p-6 sm:p-10 shadow-2xl backdrop-blur-xl">
                <!-- Form Mengarah ke Checkout Controller Process -->
                <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Nama
                                Lengkap</label>
                            <input type="text" name="name" required
                                class="w-full bg-slate-950 border border-purple-900/60 rounded-xl px-4 py-3.5 text-white placeholder-slate-500 focus:outline-none focus:border-purple-500 transition text-sm"
                                placeholder="Contoh: Budi Pratama">
                        </div>

                        <!-- No WhatsApp -->
                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Nomor
                                Telegram</label>
                            <input type="text" name="phone" required
                                class="w-full bg-slate-950 border border-purple-900/60 rounded-xl px-4 py-3.5 text-white placeholder-slate-500 focus:outline-none focus:border-purple-500 transition text-sm"
                                placeholder="081234567890">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Alamat
                            Email</label>
                        <input type="email" name="email" required
                            class="w-full bg-slate-950 border border-purple-900/60 rounded-xl px-4 py-3.5 text-white placeholder-slate-500 focus:outline-none focus:border-purple-500 transition text-sm"
                            placeholder="budi@gmail.com">
                    </div>

                    <!-- Dropdown Pilih Paket (Dinamis dari Database) -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Pilih
                            Paket Pembelajaran</label>
                        <select name="package_id" required
                            class="w-full bg-slate-950 border border-purple-900/60 rounded-xl px-4 py-3.5 text-white focus:outline-none focus:border-purple-500 transition text-sm">
                            <option value="" disabled selected>-- Pilih Paket Pembelajaran --</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}" class="bg-slate-900 text-white">
                                    {{ $package->name }} - Rp {{ number_format($package->price, 0, ',', '.') }} (Harga
                                    Normal:
                                    {{ collect(str_split('Rp ' . number_format($package->original_price, 0, ',', '.')))->map(fn($char) => $char . "\u{0336}")->join('') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-extrabold py-4 rounded-xl shadow-lg shadow-purple-900/50 transition duration-200 text-base tracking-wide uppercase">
                            Lanjut ke Pembayaran
                        </button>
                        <p class="text-xs text-center text-slate-500 mt-3">
                            *Setelah klik tombol di atas, kamu akan mendapatkan rincian pembayaran dengan 3 digit unik &
                            diarahkan ke Bot Telegram untuk verifikasi.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 py-12 border-t border-purple-900/20 text-xs text-slate-500">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-6">
            <div>
                <a href="#" class="text-lg font-bold text-white tracking-tight">Ayo<span
                        class="text-purple-400">Fasih!</span></a>
                <p class="mt-1">Belajar Bahasa Inggris Cepat Fasih, Gak Pake Takut.</p>
            </div>
            <div>
                &copy; {{ date('Y') }} Ayo Fasih! All rights reserved.
            </div>
        </div>
    </footer>

</body>

</html>
