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
                    {{ __('Edit Koleksi') }}
                </h2>
                <p class="text-slate-600 text-sm font-bold italic">Mengubah data: <span class="text-blue-600">{{ $buku->judul }}</span></p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#f0f4f8] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="bg-white shadow-2xl rounded-[3rem] border-4 border-white overflow-hidden">
                
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 h-4 w-full"></div>

                <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="p-10 sm:p-14">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        
                        <div class="md:col-span-2 group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                📚 Judul Buku
                            </label>
                            <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner" 
                                   required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                ✍️ Penulis
                            </label>
                            <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner" 
                                   required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                🏢 Penerbit
                            </label>
                            <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner" 
                                   required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                📅 Tahun Terbit
                            </label>
                            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner" 
                                   required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                📦 Stok Tersedia
                            </label>
                            <div class="relative">
                                <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" 
                                       class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner" 
                                       required>
                                <span class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-500 uppercase">Unit</span>
                            </div>
                        </div>

                    </div>

                    <div class="mt-14 pt-10 border-t border-slate-100 flex items-center justify-end space-x-8">
                        <a href="{{ route('buku.index') }}" 
                           class="text-sm font-black text-slate-500 hover:text-rose-600 transition-colors uppercase tracking-[0.2em]">
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-12 py-5 bg-blue-600 hover:bg-slate-900 text-white text-sm font-black rounded-3xl shadow-2xl shadow-blue-200 transition-all duration-300 transform hover:-translate-y-2 uppercase tracking-widest">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Perbarui Data
                        </button>
                    </div>
                </form>

            </div>
            
            <p class="text-center mt-8 text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">
                ID Koleksi: {{ $buku->id }} &bull; Terakhir Diubah: {{ $buku->updated_at->diffForHumans() }}
            </p>
        </div>
    </div>
</x-app-layout>