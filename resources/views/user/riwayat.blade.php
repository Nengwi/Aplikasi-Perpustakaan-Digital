<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('Riwayat Peminjaman Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div style="margin-bottom: 20px;">
                <a href="{{ route('peminjaman.index') }}"
                    style="display: inline-block; background-color: #4b5563; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 13px;">
                    ← Kembali ke Daftar Buku
                </a>
            </div>

            @if (session('success'))
                <div style="background-color: #16a34a !important; color: white !important; padding: 15px; margin-bottom: 20px; border-radius: 8px; font-weight: bold; border: 2px solid #14532d; text-align: center;">
                    ✅ BERHASIL: {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div style="background-color: #dc2626 !important; color: white !important; padding: 15px; margin-bottom: 20px; border-radius: 8px; font-weight: bold; border: 2px solid #7f1d1d; text-align: center;">
                    ❌ GAGAL: {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm border border-gray-300 sm:rounded-lg">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-4 border border-gray-300 text-xs font-black">JUDUL BUKU</th>
                            <th class="px-6 py-4 border border-gray-300 text-xs font-black">TANGGAL PINJAM</th>
                            <th class="px-6 py-4 border border-gray-300 text-xs font-black">STATUS</th>
                            <th class="px-6 py-4 border border-gray-300 text-xs font-black">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayat as $item)
                            <tr>
                                <td class="px-6 py-4 border border-gray-300 text-center uppercase font-bold text-sm">
                                    {{ $item->buku->judul }}
                                </td>
                                <td class="px-6 py-4 border border-gray-300 text-center text-sm">
                                    {{ $item->tanggal_pinjam }}
                                </td>
                                <td class="px-6 py-4 border border-gray-300 text-center uppercase font-bold text-sm">
                                    @if($item->status == 'dipinjam')
                                        <span style="color: #2563eb;">Dipinjam</span>
                                    @else
                                        <span style="color: #16a34a;">Dikembalikan</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                                        @if ($item->status == 'dipinjam')
                                            <form action="{{ route('peminjaman.kembali', $item->id) }}" method="POST" style="margin: 0;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    style="background-color: #dc2626 !important; color: white !important; font-weight: bold; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer; text-transform: uppercase; font-size: 11px;">
                                                    Kembalikan
                                                </button>
                                            </form>
                                        @else
                                            <span style="color: #9ca3af; font-weight: bold; text-transform: uppercase; font-size: 11px;">Selesai</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="padding: 40px; text-align: center; color: #6b7280;">
                                    <p style="margin-bottom: 15px;">Kamu belum meminjam buku apapun.</p>
                                    <a href="{{ route('peminjaman.index') }}"
                                        style="background-color: #2563eb; color: white; padding: 8px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                                        Mulai Pinjam Buku
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>