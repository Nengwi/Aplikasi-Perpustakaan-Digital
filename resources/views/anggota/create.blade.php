<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('anggota.index') }}" class="p-2.5 bg-white rounded-2xl shadow-sm text-slate-900 hover:bg-emerald-600 hover:text-white transition-all duration-300 border border-slate-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="font-black text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Registrasi Anggota') }}
                </h2>
                <p class="text-slate-600 text-sm font-bold italic">Pendaftaran member baru perpustakaan</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#f0f4f8] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="bg-white shadow-2xl rounded-[3rem] border-4 border-white overflow-hidden">
                
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 h-4 w-full"></div>

                <form action="{{ route('anggota.store') }}" method="POST" class="p-10 sm:p-14">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        
                        <div class="md:col-span-2 group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-emerald-600 transition-colors">
                                👤 Nama Lengkap
                            </label>
                            <input type="text" name="nama" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-emerald-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner uppercase" 
                                   placeholder="Masukkan nama sesuai kartu identitas" required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-emerald-600 transition-colors">
                                💳 NIM / ID Member
                            </label>
                            <input type="text" name="nim" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-emerald-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner" 
                                   placeholder="Contoh: 20210801" required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-emerald-600 transition-colors">
                                📞 Nomor Telepon
                            </label>
                            <input type="text" name="nomor_telepon" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-emerald-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner" 
                                   placeholder="08123456xxxx" required>
                        </div>

                        <div class="md:col-span-2 group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-emerald-600 transition-colors">
                                🏠 Alamat Lengkap
                            </label>
                            <textarea name="alamat" rows="3" 
                                      class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-emerald-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner italic" 
                                      placeholder="Masukkan alamat domisili sekarang" required></textarea>
                        </div>

                    </div>

                    <div class="mt-14 pt-10 border-t border-slate-100 flex items-center justify-end space-x-8">
                        <a href="{{ route('anggota.index') }}" 
                           class="text-sm font-black text-slate-500 hover:text-rose-600 transition-colors uppercase tracking-[0.2em]">
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-12 py-5 bg-slate-900 hover:bg-emerald-600 text-white text-sm font-black rounded-3xl shadow-2xl shadow-slate-300 transition-all duration-300 transform hover:-translate-y-2 uppercase tracking-widest">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Daftarkan Anggota
                        </button>
                    </div>
                </form>

            </div>
            
            <p class="text-center mt-8 text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">
                Pusat Data Anggota &bull; Keanggotaan Aktif
            </p>
        </div>
    </div>
</x-app-layout>