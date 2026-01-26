<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: #1f2937;">
            {{ __('📚 Jelajahi Koleksi Buku') }}
        </h2>
    </x-slot>

    <div style="background-color: #f3f4f6; min-height: 100vh; padding: 40px 20px; font-family: 'Figtree', sans-serif;">
        <div style="max-width: 1200px; margin: 0 auto;">
            
            <div style="background: white; padding: 25px; border-radius: 20px; margin-bottom: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 10px solid #4f46e5;">
                <h3 style="font-size: 1.2rem; font-weight: 800; color: #1f2937; margin-bottom: 5px;">Katalog Buku Digital</h3>
                <p style="color: #6b7280; font-weight: 500;">Temukan berbagai macam genre buku. Klik tombol pinjam untuk mulai membaca.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
                @forelse($bukus as $buku)
                <div style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05); border: 1px solid #eef2ff; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    
                    <div style="background: linear-gradient(45deg, #4f46e5, #a855f7); height: 180px; display: flex; align-items: center; justify-content: center; color: white;">
                        <svg style="width: 70px; height: 70px; opacity: 0.8;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>

                    <div style="padding: 25px;">
                        <span style="background: #eef2ff; color: #4f46e5; padding: 5px 12px; border-radius: 10px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">{{ $buku->kategori ?? 'Koleksi Umum' }}</span>
                        
                        <h4 style="font-size: 1.3rem; font-weight: 800; color: #1f2937; margin: 15px 0 5px 0; line-height: 1.2;">{{ $buku->judul }}</h4>
                        <p style="color: #6b7280; font-size: 0.9rem; margin-bottom: 20px;">Oleh: <span style="font-weight: 600;">{{ $buku->penulis }}</span></p>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 20px; border-top: 1px solid #f3f4f6;">
                            <div>
                                <p style="font-size: 0.7rem; color: #9ca3af; text-transform: uppercase; font-weight: 700;">Status</p>
                                <p style="font-size: 0.9rem; font-weight: 800; color: #10b981;">{{ $buku->stok ?? $buku->jumlah }} Tersedia</p>
                            </div>
                            
                            <form action="{{ route('peminjaman.store', $buku->id) }}" method="POST">
                                @csrf
                                <button type="submit" style="background: #4f46e5; color: white; border: none; padding: 10px 20px; border-radius: 12px; font-weight: 800; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);" onmouseover="this.style.background='#4338ca'" onmouseout="this.style.background='#4f46e5'">
                                    Pinjam
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div style="grid-column: 1/-1; background: white; border-radius: 20px; padding: 100px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    <svg style="width: 80px; height: 80px; color: #d1d5db; margin: 0 auto 20px auto;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    <h4 style="font-size: 1.5rem; font-weight: 800; color: #374151;">Oops! Buku belum tersedia</h4>
                    <p style="color: #6b7280;">Mohon maaf, saat ini belum ada koleksi buku yang bisa dipinjam.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>