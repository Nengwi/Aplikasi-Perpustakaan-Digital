<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('Daftar Buku Tersedia') }}
        </h2>
    </x-slot>

    <div class="mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-300 sm:rounded-lg">
                <table class="w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">JUDUL BUKU</th>
            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">PENULIS</th>
            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">STOK</th>
            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bukus as $buku)
        <tr class="hover:bg-gray-50 transition duration-150">
            <td class="px-6 py-4 text-center text-sm font-bold text-gray-900 border border-gray-300 uppercase">
                {{ $buku->judul }}
            </td>
            <td class="px-6 py-4 text-center text-sm text-gray-600 border border-gray-300">
                {{ $buku->penulis }}
            </td>
            <td class="px-6 py-4 text-center text-sm text-gray-600 border border-gray-300">
                {{ $buku->stok }} eks
            </td>
            <td class="px-6 py-4 border border-gray-300">
    <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
        @if($buku->stok > 0)
            <form action="{{ route('peminjaman.store', $buku->id) }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" 
                        style="background-color: #2563eb !important; color: white !important; font-weight: bold; padding: 8px 24px; border-radius: 6px; border: none; cursor: pointer; text-transform: uppercase; font-size: 12px; transition: 0.3s;">
                    Pinjam
                </button>
            </form>
        @else
            <span style="color: #dc2626; font-weight: bold; text-transform: uppercase; font-size: 12px;">Habis</span>
        @endif
    </div>
</td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>
