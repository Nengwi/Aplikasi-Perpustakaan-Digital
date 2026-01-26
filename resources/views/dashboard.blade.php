<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Pengunjung') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 mb-8 text-white shadow-lg relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-3xl font-bold mb-2">Halo, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-blue-100 text-lg">Selamat datang di Perpustakaan Digital. Mau baca buku apa hari ini?</p>
                    <div class="mt-6">
                        <a href="{{ route('peminjaman.index') }}" class="inline-block bg-white text-blue-600 px-6 py-2 rounded-full font-bold text-sm hover:bg-blue-50 transition shadow-md">
                            Jelajahi Koleksi Buku
                        </a>
                    </div>
                </div>
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white opacity-10 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center transform transition hover:scale-105 duration-300">
                    <div class="p-4 bg-yellow-50 rounded-xl mr-4 text-yellow-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Akses Koleksi</p>
                        <h3 class="text-xl font-bold text-gray-800">Ratusan Buku Tersedia</h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center transform transition hover:scale-105 duration-300">
                    <div class="p-4 bg-green-50 rounded-xl mr-4 text-green-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Status Pinjam</p>
                        <a href="{{ route('peminjaman.riwayat') }}" class="text-xl font-bold text-gray-800 hover:text-blue-600">Lihat Riwayat Saya →</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>