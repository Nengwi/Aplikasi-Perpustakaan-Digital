<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: #1f2937;">
            {{ __('📅 Riwayat Peminjaman Saya') }}
        </h2>
    </x-slot>

    <div style="background-color: #f8fafc; min-height: 100vh; padding: 40px 20px;">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05); border: 1px solid #eef2ff;">
                <table style="width: 100%; border-collapse: collapse; text-align: center;">
                    <thead>
                        <tr style="background-color: #f9fafb; border-bottom: 2px solid #f3f4f6;">
                            <th style="padding: 20px; color: #6b7280; font-weight: 700; text-transform: uppercase; font-size: 0.75rem;">Buku</th>
                            <th style="padding: 20px; color: #6b7280; font-weight: 700; text-transform: uppercase; font-size: 0.75rem;">Tgl Pinjam</th>
                            <th style="padding: 20px; color: #6b7280; font-weight: 700; text-transform: uppercase; font-size: 0.75rem;">Status</th>
                            <th style="padding: 20px; color: #6b7280; font-weight: 700; text-transform: uppercase; font-size: 0.75rem;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamans as $pj)
                        <tr style="border-bottom: 1px solid #f3f4f6;">
                            <td style="padding: 20px; font-weight: 700; color: #1f2937;">{{ $pj->buku->judul }}</td>
                            <td style="padding: 20px; color: #4b5563;">{{ $pj->created_at->format('d M Y') }}</td>
                            <td style="padding: 20px;">
                                <span style="background: {{ $pj->status == 'dipinjam' ? '#fef3c7' : '#d1fae5' }}; color: {{ $pj->status == 'dipinjam' ? '#92400e' : '#065f46' }}; padding: 6px 15px; border-radius: 10px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase;">
                                    {{ $pj->status }}
                                </span>
                            </td>
                            <td style="padding: 20px;">
                                @if($pj->status == 'dipinjam')
                                <form action="{{ route('peminjaman.kembali', $pj->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" style="background: #ef4444; color: white; border: none; padding: 8px 15px; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 0.8rem;">
                                        Kembalikan
                                    </button>
                                </form>
                                @else
                                <span style="color: #9ca3af; font-size: 0.8rem;">Selesai</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 40px; color: #9ca3af;">Belum ada riwayat peminjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>