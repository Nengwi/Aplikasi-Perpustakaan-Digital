<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('Daftar Buku Tersedia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; gap: 15px;">

                <form action="{{ route('peminjaman.index') }}" method="GET"
                    style="display: flex; gap: 5px; flex-basis: 400px;">
                    <input type="text" name="search" placeholder="Cari judul atau penulis..."
                        value="{{ request('search') }}"
                        style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; font-size: 13px;">

                    <button type="submit"
                        style="background-color: #2563eb; color: white; padding: 8px 15px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer; font-size: 12px;">
                        CARI
                    </button>

                    @if (request('search'))
                        <a href="{{ route('peminjaman.index') }}"
                            style="background-color: #9ca3af; color: white; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 12px; display: flex; align-items: center;">
                            RESET
                        </a>
                    @endif
                </form>

                <a href="{{ route('peminjaman.riwayat') }}"
                    style="background-color: #1e293b; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 13px; white-space: nowrap;">
                    Lihat Riwayat Pinjam →
                </a>
            </div>

            @if (session('success'))
                <div
                    style="background-color: #16a34a !important; color: white !important; padding: 15px; margin-bottom: 20px; border-radius: 8px; font-weight: bold; border: 2px solid #14532d; text-align: center;">
                    ✅ BERHASIL: {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div
                    style="background-color: #dc2626 !important; color: white !important; padding: 15px; margin-bottom: 20px; border-radius: 8px; font-weight: bold; border: 2px solid #7f1d1d; text-align: center;">
                    ❌ GAGAL: {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm border border-gray-300 sm:rounded-lg">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th
                                class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">
                                JUDUL BUKU</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">
                                PENULIS</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">
                                STOK</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">
                                AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukus as $buku)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td
                                    class="px-6 py-4 text-center text-sm font-bold text-gray-900 border border-gray-300 uppercase">
                                    {{ $buku->judul }}
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600 border border-gray-300">
                                    {{ $buku->penulis }}
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600 border border-gray-300">
                                    {{ $buku->stok }} eks
                                </td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <div
                                        style="display: flex; justify-content: center; align-items: center; width: 100%;">
                                        @if ($buku->stok > 0)
                                            <form action="{{ route('peminjaman.store', $buku->id) }}" method="POST"
                                                style="margin: 0;">
                                                @csrf
                                                <button type="submit"
                                                    style="background-color: #2563eb !important; color: white !important; font-weight: bold; padding: 8px 24px; border-radius: 6px; border: none; cursor: pointer; text-transform: uppercase; font-size: 11px;">
                                                    Pinjam
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                style="color: #dc2626; font-weight: bold; text-transform: uppercase; font-size: 11px;">Habis</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if ($bukus->isEmpty())
                            <tr>
                                <td colspan="4"
                                    style="padding: 40px; text-align: center; color: #6b7280; font-style: italic;">
                                    Maaf, buku atau penulis "{{ request('search') }}" tidak ditemukan.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
