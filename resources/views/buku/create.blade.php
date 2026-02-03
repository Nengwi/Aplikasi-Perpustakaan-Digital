<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('buku.index') }}" class="p-2.5 bg-white rounded-2xl shadow-sm text-slate-900 hover:bg-blue-600 hover:text-white transition-all duration-300 border border-slate-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="font-black text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Tambah Koleksi') }}
                </h2>
                <p class="text-slate-600 text-sm font-bold italic">Masukkan detail buku baru ke sistem</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#f0f4f8] relative overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="bg-white shadow-2xl rounded-[3rem] border-4 border-white overflow-hidden">
                
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 h-4 w-full"></div>

                <form action="{{ route('buku.store') }}" method="POST" class="p-10 sm:p-14">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        
                        <div class="md:col-span-2 group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-blue-600 transition-colors">
                                📚 Judul Buku
                            </label>
                            <input type="text" name="judul" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner" 
                                   placeholder="Contoh: Laskar Pelangi" required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-blue-600 transition-colors">
                                ✍️ Penulis
                            </label>
                            <input type="text" name="penulis" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner" 
                                   placeholder="Nama lengkap penulis" required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-blue-600 transition-colors">
                                🏢 Penerbit
                            </label>
                            <input type="text" name="penerbit" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner" 
                                   placeholder="Nama penerbit" required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-blue-600 transition-colors">
                                📅 Tahun Terbit
                            </label>
                            <input type="number" name="tahun_terbit" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner" 
                                   placeholder="2024" required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-blue-600 transition-colors">
                                📦 Stok Tersedia
                            </label>
                            <div class="relative">
                                <input type="number" name="stok" 
                                       class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 placeholder:text-slate-400 shadow-inner" 
                                       placeholder="0" required>
                                <span class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Unit</span>
                            </div>
                        </div>

                    </div>

                    <div class="mt-14 pt-10 border-t border-slate-100 flex items-center justify-end space-x-8">
                        <a href="{{ route('buku.index') }}" 
                           class="text-sm font-black text-slate-500 hover:text-rose-600 transition-colors uppercase tracking-[0.2em]">
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-12 py-5 bg-slate-900 hover:bg-blue-600 text-white text-sm font-black rounded-3xl shadow-2xl shadow-slate-300 transition-all duration-300 transform hover:-translate-y-2 uppercase tracking-widest">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Koleksi
                        </button>
                    </div>
                </form>

            </div>
            
            <p class="text-center mt-8 text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">
                Sistem Manajemen Perpustakaan &bull; 2026
            </p>
        </div>
    </div>
</x-app-layout>