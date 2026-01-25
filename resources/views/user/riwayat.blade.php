<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('Riwayat Peminjaman Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-300 sm:rounded-lg">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-4 border border-gray-300">JUDUL BUKU</th>
                            <th class="px-6 py-4 border border-gray-300">TANGGAL PINJAM</th>
                            <th class="px-6 py-4 border border-gray-300">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayat as $item)
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 text-center uppercase font-bold">{{ $item->buku->judul }}</td>
                            <td class="px-6 py-4 border border-gray-300 text-center">{{ $item->tanggal_pinjam }}</td>
                            <td class="px-6 py-4 border border-gray-300 text-center italic uppercase text-blue-600 font-bold">
                                {{ $item->status }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-gray-500 italic">Belum ada buku yang dipinjam.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>