<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Koleksi Buku') }}
            </h2>

            <a href="{{ route('buku.create') }}" style="background-color: #2563eb; color: white !important;"
                class="px-5 py-2 rounded-lg font-bold shadow-md hover:bg-blue-700 transition">
                + TAMBAH BUKU BARU
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mb-6">
            <div class="w-full rounded-xl border border-green-300 bg-green-100 px-5 py-4 shadow">
                <div class="flex items-center text-green-800 font-semibold">
                    <svg class="w-6 h-6 mr-3 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        </div>
    @endif



    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-200 p-4 text-left font-bold text-gray-700 uppercase text-xs">Judul
                            Buku</th>
                        <th class="border border-gray-200 p-4 text-left font-bold text-gray-700 uppercase text-xs">
                            Penulis</th>
                        <th class="border border-gray-200 p-4 text-left font-bold text-gray-700 uppercase text-xs">
                            Penerbit</th>
                        <th class="border border-gray-200 p-4 text-center font-bold text-gray-700 uppercase text-xs">
                            Tahun</th>
                        <th class="border border-gray-200 p-4 text-center font-bold text-gray-700 uppercase text-xs">
                            Stok</th>
                        <th class="border border-gray-200 p-4 text-center font-bold text-gray-700 uppercase text-xs">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($bukus as $b)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="border border-gray-200 p-4 text-sm font-semibold text-gray-800">
                                {{ $b->judul }}</td>
                            <td class="border border-gray-200 p-4 text-sm text-gray-600">{{ $b->penulis }}</td>
                            <td class="border border-gray-200 p-4 text-sm text-gray-600">{{ $b->penerbit }}</td>
                            <td class="border border-gray-200 p-4 text-sm text-center text-gray-600">
                                {{ $b->tahun_terbit }}</td>
                            <td class="border border-gray-200 p-4 text-sm text-center text-gray-600">{{ $b->stok }}
                            </td>
                            <td class="border border-gray-200 p-4 text-sm text-center">
                                <div class="flex justify-center items-center space-x-4">

                                    <a href="{{ route('buku.edit', $b->id) }}"
                                        class="text-blue-600 hover:text-blue-900 transition-colors" title="Edit Buku">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('buku.destroy', $b->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors"
                                            title="Hapus Buku">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border border-gray-200 p-10 text-center text-gray-400 italic">
                                Belum ada data buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>