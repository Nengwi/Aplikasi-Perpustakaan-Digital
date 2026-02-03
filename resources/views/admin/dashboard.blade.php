<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-3xl text-slate-800 leading-tight tracking-tight">
                {{ __('Dashboard Utama Admin') }}
            </h2>
            <div class="px-4 py-2 bg-white/50 backdrop-blur-md rounded-2xl border border-white/20 shadow-sm text-sm text-slate-600 font-bold">
                <span class="text-blue-600 mr-1">📅</span> {{ now()->format('d F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#f0f4f8] relative overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-96 h-96 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                
                <div class="group relative bg-white/40 backdrop-blur-xl p-2 rounded-[2.5rem] shadow-xl shadow-blue-500/10 border border-white/50 transition-all duration-500 hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 p-8 rounded-[2.2rem] text-white relative overflow-hidden">
                        <div class="relative z-10">
                            <p class="text-blue-100 text-xs font-black uppercase tracking-[0.2em] mb-1">Total Stok Buku</p>
                            <h3 class="text-6xl font-black tracking-tighter">{{ $totalBuku }}</h3>
                            <div class="mt-6 flex items-center bg-white/10 w-fit px-3 py-1 rounded-full backdrop-blur-md">
                                <span class="text-[10px] font-bold">📚 Koleksi Tersedia</span>
                            </div>
                        </div>
                        <div class="absolute -right-2 -bottom-2 opacity-20 transform rotate-12">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-white/40 backdrop-blur-xl p-2 rounded-[2.5rem] shadow-xl shadow-orange-500/10 border border-white/50 transition-all duration-500 hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-orange-500 via-amber-600 to-red-600 p-8 rounded-[2.2rem] text-white relative overflow-hidden">
                        <div class="relative z-10">
                            <p class="text-orange-100 text-xs font-black uppercase tracking-[0.2em] mb-1">Sedang Dipinjam</p>
                            <h3 class="text-6xl font-black tracking-tighter">{{ $bukuDipinjam }}</h3>
                            <div class="mt-6 flex items-center bg-white/10 w-fit px-3 py-1 rounded-full backdrop-blur-md">
                                <span class="text-[10px] font-bold">🕒 Menunggu Balik</span>
                            </div>
                        </div>
                        <div class="absolute -right-2 -bottom-2 opacity-20 transform rotate-12">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-white/40 backdrop-blur-xl p-2 rounded-[2.5rem] shadow-xl shadow-emerald-500/10 border border-white/50 transition-all duration-500 hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-700 p-8 rounded-[2.2rem] text-white relative overflow-hidden">
                        <div class="relative z-10">
                            <p class="text-emerald-100 text-xs font-black uppercase tracking-[0.2em] mb-1">Total Anggota</p>
                            <h3 class="text-6xl font-black tracking-tighter">{{ $totalUser }}</h3>
                            <div class="mt-6 flex items-center bg-white/10 w-fit px-3 py-1 rounded-full backdrop-blur-md">
                                <span class="text-[10px] font-bold">👥 Anggota Aktif</span>
                            </div>
                        </div>
                        <div class="absolute -right-2 -bottom-2 opacity-20 transform rotate-12">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white/70 backdrop-blur-2xl rounded-[3rem] shadow-2xl shadow-slate-200/50 border border-white overflow-hidden">
                <div class="px-10 py-10 flex justify-between items-end">
                    <div>
                        <span class="text-blue-600 font-black text-xs uppercase tracking-widest bg-blue-50 px-3 py-1 rounded-lg">Activity Log</span>
                        <h3 class="font-black text-3xl text-slate-800 mt-2 tracking-tight">Riwayat Transaksi</h3>
                    </div>
                    <button class="bg-slate-900 text-white px-6 py-3 rounded-2xl font-bold text-sm hover:bg-blue-600 transition-colors shadow-lg shadow-slate-200">
                        Lihat Semua
                    </button>
                </div>
                
                <div class="overflow-x-auto px-10 pb-10">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-slate-400 text-[11px] font-black uppercase tracking-[0.2em] border-b border-slate-100">
                                <th class="px-4 py-6">Peminjam</th>
                                <th class="px-4 py-6">Detail Buku</th>
                                <th class="px-4 py-6 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($recentPeminjaman as $pj)
                            <tr class="group hover:bg-blue-50/30 transition-all duration-300">
                                <td class="px-4 py-6">
                                    <div class="flex items-center">
                                        <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-black shadow-lg shadow-blue-200">
                                            {{ substr($pj->user->name, 0, 1) }}
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-black text-slate-800">{{ $pj->user->name }}</p>
                                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">Member Premium</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-6">
                                    <p class="text-sm text-slate-700 font-bold italic leading-relaxed">"{{ $pj->buku->judul }}"</p>
                                    <div class="flex items-center mt-1">
                                        <span class="text-[10px] text-slate-400 font-medium italic">{{ $pj->created_at->diffForHumans() }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-6 text-center">
                                    @if($pj->status == 'dipinjam')
                                        <span class="inline-flex items-center bg-orange-50 text-orange-600 px-4 py-2 rounded-xl text-[10px] font-black uppercase border border-orange-100">
                                            <span class="w-2 h-2 rounded-full bg-orange-500 mr-2 animate-pulse"></span>
                                            Pinjam
                                        </span>
                                    @else
                                        <span class="inline-flex items-center bg-emerald-50 text-emerald-600 px-4 py-2 rounded-xl text-[10px] font-black uppercase border border-emerald-100">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2"></span>
                                            Kembali
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>