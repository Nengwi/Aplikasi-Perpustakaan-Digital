<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-black text-3xl text-slate-800 leading-tight tracking-tight">
                    {{ __('Daftar Koleksi Buku') }}
                </h2>
                <p class="text-slate-500 text-sm font-medium mt-1">Manajemen inventaris buku perpustakaan</p>
            </div>
            
            <a href="{{ route('buku.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white text-sm font-bold rounded-2xl shadow-lg shadow-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                TAMBAH BUKU BARU
            </a>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#f0f4f8] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <form action="{{ route('buku.index') }}" method="GET" class="flex gap-4">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="block w-full pl-14 pr-10 py-4 bg-white/60 backdrop-blur-xl border-none rounded-[1.5rem] shadow-sm focus:ring-4 focus:ring-blue-100 font-bold text-slate-700 transition-all" 
                               placeholder="Cari Judul, Penerbit, atau Penulis...">
                        
                        @if(request('search'))
                            <a href="{{ route('buku.index') }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-rose-500 hover:text-rose-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <button type="submit" class="px-8 bg-slate-800 text-white rounded-[1.5rem] font-black text-xs uppercase tracking-widest hover:bg-slate-900 transition-all shadow-lg">
                        CARI
                    </button>
                </form>
            </div>

            @if (session('success'))
                <div class="mb-8 animate-bounce-short">
                    <div class="w-full rounded-2xl border border-emerald-200 bg-emerald-50/80 backdrop-blur-md px-6 py-4 shadow-sm flex items-center">
                        <div class="bg-emerald-500 p-2 rounded-xl mr-4 shadow-lg shadow-emerald-200">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-emerald-800 font-bold text-sm">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white/70 backdrop-blur-2xl rounded-[3rem] shadow-2xl shadow-slate-200/50 border border-white overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-800">
                <tr class="text-white text-[11px] font-black uppercase tracking-[0.2em]">
                    <th class="px-8 py-5 rounded-tl-[2.5rem]">Informasi Buku</th>
                    <th class="px-4 py-5">Penerbit & Tahun</th>
                    <th class="px-4 py-5 text-center">Stok & Kategori</th>
                    <th class="px-8 py-5 text-right rounded-tr-[2.5rem]">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-50">
                @forelse ($bukus as $b)
                    <tr class="group hover:bg-white/40 transition-all duration-300">
                        <td class="px-8 py-6 bg-slate-50/40 group-hover:bg-transparent">
                            <div class="flex items-center">
                                <div class="h-14 w-10 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex flex-shrink-0 items-center justify-center shadow-lg group-hover:rotate-3 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div class="ml-5">
                                    <p class="text-sm font-black text-slate-800 leading-tight uppercase">{{ $b->judul }}</p>
                                    <p class="text-[10px] text-orange-600 font-bold mt-1 uppercase italic">Penulis: {{ $b->penulis }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-6 bg-blue-50/30 group-hover:bg-transparent">
                            <p class="text-xs font-black text-slate-700 uppercase tracking-wide">{{ $b->penerbit }}</p>
                            <p class="text-[9px] text-slate-400 font-bold uppercase mt-1">Tahun: {{ $b->tahun_terbit }}</p>
                        </td>

                        <td class="px-4 py-6 text-center bg-emerald-50/30 group-hover:bg-transparent">
                            <div class="inline-flex flex-col items-center px-4 py-2 bg-white rounded-2xl shadow-sm border border-emerald-100">
                                <span class="text-xs font-black text-emerald-700">{{ $b->stok }}</span>
                                <span class="text-[8px] font-black text-emerald-300 uppercase tracking-widest mt-0.5">Tersedia</span>
                            </div>
                        </td>

                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('buku.edit', $b->id) }}" class="p-2 bg-white text-blue-600 rounded-xl border border-slate-100 shadow-sm hover:bg-blue-600 hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('buku.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Hapus buku ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 bg-white text-rose-500 rounded-xl border border-slate-100 shadow-sm hover:bg-rose-500 hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center text-slate-400 font-bold italic uppercase tracking-widest text-sm">Buku tidak ditemukan...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

        </div>
    </div>
</x-app-layout>