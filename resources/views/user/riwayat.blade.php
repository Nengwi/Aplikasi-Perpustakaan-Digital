<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('Riwayat Peminjaman Saya') }}
        </h2>
    </x-slot>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-300 sm:rounded-lg">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-4 border border-gray-300">JUDUL BUKU</th>
                            <th class="px-6 py-4 border border-gray-300">TANGGAL PINJAM</th>
                            <th class="px-6 py-4 border border-gray-300">STATUS</th>
                            <th class="px-6 py-4 border border-gray-300">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayat as $item)
                            <tr>
                                <td class="px-6 py-4 border border-gray-300 text-center uppercase font-bold">
                                    {{ $item->buku->judul }}</td>
                                <td class="px-6 py-4 border border-gray-300 text-center">{{ $item->tanggal_pinjam }}
                                </td>
                                <td
                                    class="px-6 py-4 border border-gray-300 text-center uppercase font-bold text-blue-600">
                                    {{ $item->status }}
                                </td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <div
                                        style="display: flex; justify-content: center; align-items: center; width: 100%;">
                                        @if ($item->status == 'dipinjam')
                                            <form action="{{ route('peminjaman.kembali', $item->id) }}" method="POST"
                                                style="margin: 0;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    style="background-color: #dc2626 !important; color: white !important; font-weight: bold; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer; text-transform: uppercase; font-size: 12px;">
                                                    Kembalikan
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                style="color: #16a34a; font-weight: bold; text-transform: uppercase; font-size: 12px;">Selesai</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                @if (session('success'))
                    <div class="max-w-7xl mx-auto mb-4 px-4 sm:px-6 lg:px-8">
                        <div
                            class="bg-green-500 text-white p-4 rounded-lg shadow-md font-bold text-center uppercase text-sm tracking-widest">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
