<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
                
                <div style="background-color: #ffffff; padding: 25px; border-radius: 12px; border-left: 5px solid #2563eb; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                    <p style="color: #6b7280; font-size: 14px; font-weight: bold; text-transform: uppercase;">Total Stok Buku</p>
                    <h3 style="font-size: 28px; font-weight: 800; color: #1e293b;">{{ $totalBuku }}</h3>
                </div>

                <div style="background-color: #ffffff; padding: 25px; border-radius: 12px; border-left: 5px solid #eab308; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                    <p style="color: #6b7280; font-size: 14px; font-weight: bold; text-transform: uppercase;">Buku Dipinjam</p>
                    <h3 style="font-size: 28px; font-weight: 800; color: #1e293b;">{{ $bukuDipinjam }}</h3>
                </div>

                <div style="background-color: #ffffff; padding: 25px; border-radius: 12px; border-left: 5px solid #16a34a; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                    <p style="color: #6b7280; font-size: 14px; font-weight: bold; text-transform: uppercase;">Total Anggota</p>
                    <h3 style="font-size: 28px; font-weight: 800; color: #1e293b;">{{ $totalUser }}</h3>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div style="padding: 20px; border-bottom: 1px solid #e5e7eb; background-color: #f8fafc;">
                    <h3 style="font-weight: bold; color: #334155;">Riwayat Transaksi Terbaru</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase border-b">Nama Peminjam</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase border-b">Judul Buku</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase border-b">Tanggal Pinjam</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase border-b text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($recentPeminjaman as $pj)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $pj->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $pj->buku->judul }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($pj->tanggal_pinjam)->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($pj->status == 'dipinjam')
                                        <span style="background-color: #fef9c3; color: #854d0e; padding: 4px 12px; border-radius: 9999px; font-size: 11px; font-weight: bold;">DIPINJAM</span>
                                    @else
                                        <span style="background-color: #dcfce7; color: #166534; padding: 4px 12px; border-radius: 9999px; font-size: 11px; font-weight: bold;">KEMBALI</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic">Belum ada aktivitas peminjaman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>