<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-black text-3xl text-slate-800 leading-tight tracking-tight">
                    {{ __('Daftar Anggota Perpustakaan') }}
                </h2>
                <p class="text-slate-500 text-sm font-medium mt-1">Manajemen basis data member aktif</p>
            </div>

            <a href="{{ route('anggota.create') }}"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white text-sm font-bold rounded-2xl shadow-lg shadow-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                TAMBAH ANGGOTA BARU
            </a>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#f0f4f8] relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-80 h-80 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>
        <div
            class="absolute bottom-0 left-0 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8">
                <form action="{{ route('anggota.index') }}" method="GET" class="flex gap-4">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="block w-full pl-14 pr-12 py-4 bg-white/70 backdrop-blur-xl border-none rounded-[1.5rem] shadow-sm focus:ring-4 focus:ring-blue-100 font-bold text-slate-700 transition-all"
                            placeholder="Cari Nama atau NIM Anggota...">

                        @if (request('search'))
                            <a href="{{ route('anggota.index') }}"
                                class="absolute inset-y-0 right-4 flex items-center text-rose-500 hover:text-rose-700 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <button type="submit"
                        class="px-8 bg-slate-800 text-white rounded-[1.5rem] font-black text-xs uppercase tracking-widest hover:bg-slate-900 transition-all shadow-lg shadow-slate-200">
                        CARI
                    </button>
                </form>
            </div>

            @if (session('success'))
                <div class="mb-8 animate-fade-in-down">
                    <div
                        class="w-full rounded-2xl border border-emerald-200 bg-emerald-50/80 backdrop-blur-md px-6 py-4 shadow-sm flex items-center">
                        <div class="bg-emerald-500 p-2 rounded-xl mr-4">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-emerald-800 font-bold text-sm">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div
                class="bg-white/70 backdrop-blur-2xl rounded-[3rem] shadow-2xl shadow-slate-200/50 border border-white overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-800">
                            <tr class="text-white text-[11px] font-black uppercase tracking-[0.2em]">
                                <th class="px-8 py-5 rounded-tl-[2rem]">Profil Anggota</th>
                                <th class="px-4 py-5">NIM / ID Member</th>
                                <th class="px-4 py-5">Alamat Rumah</th>
                                <th class="px-4 py-5 text-center">Kontak</th>
                                <th class="px-8 py-5 text-right rounded-tr-[2rem]">Aksi</th>
                            </tr>
                        </thead>
                        @forelse ($anggotas as $anggota)
                            <tr class="group hover:bg-white/40 transition-all duration-300">
                                <td class="px-8 py-6 bg-slate-50/30 group-hover:bg-transparent">
                                    <div class="flex items-center">
                                        <div
                                            class="h-12 w-12 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-700 flex flex-shrink-0 items-center justify-center shadow-lg shadow-indigo-200 group-hover:scale-110 transition-transform duration-300">
                                            <span
                                                class="text-white font-black text-lg">{{ substr($anggota->nama, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-5">
                                            <p
                                                class="text-sm font-black text-slate-800 leading-tight uppercase tracking-wide">
                                                {{ $anggota->nama }}</p>
                                            <div class="flex items-center mt-1">
                                                <span class="flex h-2 w-2 rounded-full bg-emerald-500 mr-2"></span>
                                                <p
                                                    class="text-[10px] text-slate-500 font-bold uppercase tracking-tighter">
                                                    Member Aktif</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-6 bg-blue-50/40 group-hover:bg-transparent">
                                    <span
                                        class="px-4 py-2 bg-blue-600 text-white rounded-xl text-xs font-black shadow-md shadow-blue-200 uppercase tracking-widest">
                                        {{ $anggota->nim }}
                                    </span>
                                </td>

                                <td class="px-4 py-6 bg-emerald-50/30 group-hover:bg-transparent">
                                    <div class="flex items-start max-w-[200px]">
                                        <svg class="w-4 h-4 text-emerald-600 mt-0.5 mr-2 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                        </svg>
                                        <p class="text-xs text-emerald-900 font-bold leading-relaxed italic">
                                            {{ $anggota->alamat }}
                                        </p>
                                    </div>
                                </td>

                                <td class="px-4 py-6 text-center bg-indigo-50/30 group-hover:bg-transparent">
                                    <div
                                        class="inline-flex flex-col items-center px-4 py-2 bg-white rounded-2xl shadow-sm border border-indigo-100">
                                        <span
                                            class="text-xs font-black text-indigo-700">{{ $anggota->nomor_telepon }}</span>
                                        <span
                                            class="text-[8px] font-black text-indigo-300 uppercase tracking-[0.2em] mt-0.5">Verified</span>
                                    </div>
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end items-center space-x-3">
                                        <a href="{{ route('anggota.edit', $anggota->id) }}"
                                            class="p-2.5 bg-white text-blue-600 rounded-xl border border-slate-100 shadow-sm hover:shadow-indigo-200 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus data anggota ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="p-2.5 bg-white text-rose-500 rounded-xl border border-slate-100 shadow-sm hover:shadow-rose-200 hover:bg-rose-500 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </table>
                </div>

                <div class="px-10 py-6 bg-slate-50/50 border-t border-slate-100 flex justify-between items-center">
                    <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em]">Total Terdaftar:
                        {{ count($anggotas) }} Anggota</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
