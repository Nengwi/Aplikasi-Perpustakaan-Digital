<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: #1f2937;">
            {{ __('📚 Jelajahi Koleksi Buku') }}
        </h2>
    </x-slot>

    <div style="background-color: #f3f4f6; min-height: 100vh; padding: 40px 20px; font-family: 'Figtree', sans-serif;">
        <div style="max-width: 1200px; margin: 0 auto;">
            
            <div style="background: white; padding: 30px; border-radius: 20px; margin-bottom: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 10px solid #4f46e5;">
                <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 20px;">
                    <div>
                        <h3 style="font-size: 1.2rem; font-weight: 800; color: #1f2937; margin-bottom: 5px;">Katalog Buku Digital</h3>
                        <p style="color: #6b7280; font-weight: 500;">Temukan berbagai macam genre buku. Klik tombol pinjam untuk mulai membaca.</p>
                    </div>

                    <form action="{{ route('peminjaman.index') }}" method="GET" style="flex-grow: 1; max-width: 500px; position: relative;">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Cari Judul, Penerbit, atau Tahun..." 
                               style="width: 100%; padding: 12px 20px 12px 45px; border-radius: 15px; border: 2px solid #eef2ff; font-weight: 600; outline: none; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                               onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 4px rgba(79, 70, 229, 0.1)';"
                               onblur="this.style.borderColor='#eef2ff'; this.style.boxShadow='none';">
                        
                        <svg style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>

                        @if(request('search'))
                            <a href="{{ route('peminjaman.index') }}" style="position: absolute; right: 80px; top: 50%; transform: translateY(-50%); color: #ef4444; font-size: 0.75rem; font-weight: 800; text-decoration: none; text-transform: uppercase;">Reset</a>
                        @endif

                        <button type="submit" style="position: absolute; right: 5px; top: 5px; bottom: 5px; background: #1f2937; color: white; border: none; padding: 0 15px; border-radius: 10px; font-weight: 700; cursor: pointer; font-size: 0.8rem;">Cari</button>
                    </form>
                </div>
                
                @if(request('search'))
                <p style="margin-top: 15px; font-size: 0.85rem; color: #6b7280; font-weight: 600;">
                    Hasil pencarian untuk: <span style="color: #4f46e5; font-style: italic;">"{{ request('search') }}"</span>
                </p>
                @endif
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
                @forelse($bukus as $buku)
                <div style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05); border: 1px solid #eef2ff; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    
                    <div style="background: linear-gradient(45deg, #4f46e5, #a855f7); height: 180px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white; padding: 20px; text-align: center;">
                        <svg style="width: 50px; height: 50px; opacity: 0.6; margin-bottom: 10px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <p style="font-size: 0.65rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; opacity: 0.8;">{{ $buku->penerbit }}</p>
                        <p style="font-size: 0.65rem; font-weight: 800; opacity: 0.8;">Tahun: {{ $buku->tahun_terbit }}</p>
                    </div>

                    <div style="padding: 25px;">
                        <span style="background: #eef2ff; color: #4f46e5; padding: 5px 12px; border-radius: 10px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;">{{ $buku->kategori ?? 'Koleksi Umum' }}</span>
                        
                        <h4 style="font-size: 1.3rem; font-weight: 800; color: #1f2937; margin: 15px 0 5px 0; line-height: 1.2;">{{ $buku->judul }}</h4>
                        <p style="color: #6b7280; font-size: 0.9rem; margin-bottom: 20px;">Oleh: <span style="font-weight: 600;">{{ $buku->penulis }}</span></p>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 20px; border-top: 1px solid #f3f4f6;">
                            <div>
                                <p style="font-size: 0.7rem; color: #9ca3af; text-transform: uppercase; font-weight: 700;">Tersedia</p>
                                <p style="font-size: 0.9rem; font-weight: 800; color: {{ ($buku->stok ?? $buku->jumlah) > 0 ? '#10b981' : '#ef4444' }};">
                                    {{ $buku->stok ?? $buku->jumlah }} Buku
                                </p>
                            </div>
                            
                            <form action="{{ route('peminjaman.store', $buku->id) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                    {{ ($buku->stok ?? $buku->jumlah) <= 0 ? 'disabled' : '' }}
                                    style="background: {{ ($buku->stok ?? $buku->jumlah) > 0 ? '#4f46e5' : '#d1d5db' }}; color: white; border: none; padding: 10px 20px; border-radius: 12px; font-weight: 800; cursor: {{ ($buku->stok ?? $buku->jumlah) > 0 ? 'pointer' : 'not-allowed' }}; transition: 0.3s; box-shadow: {{ ($buku->stok ?? $buku->jumlah) > 0 ? '0 4px 10px rgba(79, 70, 229, 0.3)' : 'none' }};" 
                                    onmouseover="{{ ($buku->stok ?? $buku->jumlah) > 0 ? 'this.style.background=\'#4338ca\'' : '' }}" 
                                    onmouseout="{{ ($buku->stok ?? $buku->jumlah) > 0 ? 'this.style.background=\'#4f46e5\'' : '' }}">
                                    {{ ($buku->stok ?? $buku->jumlah) > 0 ? 'Pinjam' : 'Habis' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div style="grid-column: 1/-1; background: white; border-radius: 20px; padding: 80px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    <svg style="width: 80px; height: 80px; color: #d1d5db; margin: 0 auto 20px auto;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <h4 style="font-size: 1.5rem; font-weight: 800; color: #374151;">Buku tidak ditemukan</h4>
                    <p style="color: #6b7280;">Maaf, pencarian untuk "{{ request('search') }}" tidak membuahkan hasil. Coba kata kunci lain.</p>
                    <a href="{{ route('peminjaman.index') }}" style="display: inline-block; margin-top: 20px; color: #4f46e5; font-weight: 800; text-decoration: none;">Kembali ke Katalog Lengkap →</a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>