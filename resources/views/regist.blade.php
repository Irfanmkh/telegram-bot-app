   @extends('layouts.app')

   @section('content')
       <!-- Form Registrasi -->
       <section id="register" class="py-24 bg-[#0A0E17] border-t border-slate-800/50">
           <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
               <div class="text-center mb-12">
                   <h2 class="text-3xl font-bold text-white">Formulir Pendaftaran</h2>
                   <p class="text-slate-400 mt-3 text-base">Isi data dirimu di bawah ini untuk memulai langkah belajar di
                       Ayo
                       Fasih!</p>
               </div>

               <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-10 shadow-sm">
                   <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
                       @csrf

                       <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                           <!-- Nama Lengkap -->
                           <div class="space-y-2">
                               <label class="block text-sm font-medium text-slate-300">Nama Lengkap</label>
                               <input type="text" name="name" required
                                   class="w-full bg-slate-950 border border-slate-700 rounded-md px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-shadow text-sm"
                                   placeholder="Budi Pratama">
                           </div>

                           <!-- No WhatsApp/Telegram -->
                           <div class="space-y-2">
                               <label class="block text-sm font-medium text-slate-300">Nomor Telegram</label>
                               <input type="number" name="phone" required
                                   class="w-full bg-slate-950 border border-slate-700 rounded-md px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-shadow text-sm"
                                   placeholder="081234567890">
                           </div>
                       </div>

                       <!-- Email -->
                       <div class="space-y-2">
                           <label class="block text-sm font-medium text-slate-300">Alamat Email</label>
                           <input type="email" name="email" required
                               class="w-full bg-slate-950 border border-slate-700 rounded-md px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-shadow text-sm"
                               placeholder="budi@email.com">
                       </div>

                       <!-- Dropdown Pilih Paket -->
                       <div class="space-y-2">
                           <label class="block text-sm font-medium text-slate-300">Pilih Paket Pembelajaran</label>
                           <select name="package_id" required
                               class="w-full bg-slate-950 border border-slate-700 rounded-md px-4 py-3 text-white focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-shadow text-sm appearance-none">
                               <option value="" disabled selected>-- Pilih Paket Pembelajaran --</option>
                               @foreach ($packages as $package)
                                   <option value="{{ $package->id }}" class="bg-slate-900 text-white">
                                       {{ $package->name }} - Rp {{ number_format($package->price, 0, ',', '.') }}
                                       (Normal: Rp {{ number_format($package->original_price, 0, ',', '.') }})
                                   </option>
                               @endforeach
                           </select>
                       </div>

                       <!-- Submit Button -->
                       <div class="pt-6">
                           <button type="submit"
                               class="w-full bg-white text-slate-900 hover:bg-slate-200 font-semibold py-3.5 rounded-md transition-colors text-base">
                               Lanjut ke Pembayaran
                           </button>
                           <p class="text-xs text-center text-slate-500 mt-4 leading-relaxed">
                               Setelah klik tombol di atas, Anda akan mendapatkan rincian pembayaran unik<br
                                   class="hidden sm:block"> dan diarahkan ke Bot Telegram untuk verifikasi otomatis.
                           </p>
                       </div>
                   </form>
               </div>
           </div>
       </section>
   @endsection
