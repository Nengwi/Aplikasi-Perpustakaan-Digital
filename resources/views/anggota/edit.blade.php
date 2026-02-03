<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('anggota.index') }}" class="p-2.5 bg-white rounded-2xl shadow-sm text-slate-900 hover:bg-orange-500 hover:text-white transition-all duration-300 border border-slate-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="font-black text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Edit Profil Anggota') }}
                </h2>
                <p class="text-slate-600 text-sm font-bold italic">Memperbarui data: <span class="text-orange-600">{{ $anggota->nama }}</span></p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#f0f4f8] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-orange-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="bg-white shadow-2xl rounded-[3rem] border-4 border-white overflow-hidden">
                
                <div class="bg-gradient-to-r from-orange-500 to-amber-600 h-4 w-full"></div>

                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" class="p-10 sm:p-14">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        
                        <div class="md:col-span-2 group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                👤 Nama Lengkap
                            </label>
                            <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner uppercase" 
                                   required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                💳 NIM / ID Member
                            </label>
                            <input type="text" name="nim" value="{{ old('nim', $anggota->nim) }}" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner" 
                                   required>
                        </div>

                        <div class="group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                📞 Nomor Telepon
                            </label>
                            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $anggota->nomor_telepon) }}" 
                                   class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner" 
                                   required>
                        </div>

                        <div class="md:col-span-2 group">
                            <label class="block text-xs font-black text-slate-900 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-orange-600 transition-colors">
                                🏠 Alamat Lengkap
                            </label>
                            <textarea name="alamat" rows="3" 
                                      class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-orange-500 focus:bg-white focus:ring-0 transition-all duration-300 font-bold text-slate-900 shadow-inner italic" 
                                      required>{{ old('alamat', $anggota->alamat) }}</textarea>
                        </div>

                    </div>

                    <div class="mt-14 pt-10 border-t border-slate-100 flex items-center justify-end space-x-8">
                        <a href="{{ route('anggota.index') }}" 
                           class="text-sm font-black text-slate-500 hover:text-rose-600 transition-colors uppercase tracking-[0.2em]">
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-12 py-5 bg-slate-900 hover:bg-orange-600 text-white text-sm font-black rounded-3xl shadow-2xl shadow-slate-200 transition-all duration-300 transform hover:-translate-y-2 uppercase tracking-widest">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
            
            <p class="text-center mt-8 text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">
                ID Member: {{ $anggota->id }} &bull; Bergabung: {{ $anggota->created_at->format('d M Y') }}
            </p>
        </div>
    </div>
</x-app-layout>