<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: #1f2937;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="background-color: #f8fafc; min-height: 100vh; padding: 40px 20px; font-family: 'Figtree', sans-serif;">
        <div style="max-width: 1100px; margin: 0 auto;">
            
            <div style="background: linear-gradient(135deg, #4f46e5 0%, #a855f7 100%); border-radius: 30px; padding: 50px; margin-bottom: 40px; color: white; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                <div style="position: relative; z-index: 10;">
                    <span style="background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Selamat Datang</span>
                    <h3 style="font-size: 3rem; font-weight: 900; margin: 15px 0 10px 0;">Halo, {{ Auth::user()->name }}! 👋</h3>
                    <p style="font-size: 1.1rem; opacity: 0.9; max-width: 600px; line-height: 1.6;">Sudah siap menjelajahi dunia hari ini? Ada ribuan cerita yang menunggumu di perpustakaan kami.</p>
                    <div style="margin-top: 30px;">
                        <a href="{{ route('peminjaman.index') }}" style="background: white; color: #4f46e5; padding: 12px 25px; border-radius: 12px; font-weight: 800; text-decoration: none; display: inline-flex; align-items: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            CARI BUKU SEKARANG <span style="margin-left: 10px;">→</span>
                        </a>
                    </div>
                </div>
                <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div style="position: absolute; bottom: -20px; right: 100px; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
                
                <div style="background: white; border-radius: 25px; padding: 35px; text-align: center; border: 2px solid #eef2ff; border-bottom: 6px solid #4f46e5; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);">
                    <div style="background: #eef2ff; width: 80px; height: 80px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px auto;">
                        <svg style="width: 40px; height: 40px; color: #4f46e5;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h4 style="font-size: 1.5rem; font-weight: 800; color: #1f2937; margin-bottom: 10px;">Jelajahi Katalog</h4>
                    <p style="color: #6b7280; font-size: 0.95rem; margin-bottom: 25px; line-height: 1.5;">Cek ketersediaan buku favoritmu dan pinjam secara instan.</p>
                    <a href="{{ route('peminjaman.index') }}" style="background: #eef2ff; color: #4f46e5; padding: 10px 25px; border-radius: 10px; font-weight: 700; text-decoration: none; font-size: 0.9rem;">Lihat Semua Buku</a>
                </div>

                <div style="background: white; border-radius: 25px; padding: 35px; text-align: center; border: 2px solid #f0fdf4; border-bottom: 6px solid #22c55e; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);">
                    <div style="background: #f0fdf4; width: 80px; height: 80px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px auto;">
                        <svg style="width: 40px; height: 40px; color: #22c55e;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h4 style="font-size: 1.5rem; font-weight: 800; color: #1f2937; margin-bottom: 10px;">Riwayat Pinjam</h4>
                    <p style="color: #6b7280; font-size: 0.95rem; margin-bottom: 25px; line-height: 1.5;">Pantau buku yang sedang kamu pinjam dan tanggal kembalinya.</p>
                    <a href="{{ route('peminjaman.riwayat') }}" style="background: #f0fdf4; color: #22c55e; padding: 10px 25px; border-radius: 10px; font-weight: 700; text-decoration: none; font-size: 0.9rem;">Cek Aktivitas →</a>
                </div>

                <div style="background: white; border-radius: 25px; padding: 35px; text-align: center; border: 2px solid #fff7ed; border-bottom: 6px solid #f97316; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);">
                    <div style="background: #fff7ed; width: 80px; height: 80px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px auto;">
                        <svg style="width: 40px; height: 40px; color: #f97316;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h4 style="font-size: 1.5rem; font-weight: 800; color: #1f2937; margin-bottom: 10px;">Pengaturan Akun</h4>
                    <p style="color: #6b7280; font-size: 0.95rem; margin-bottom: 25px; line-height: 1.5;">Update data diri atau ubah kata sandi agar akunmu tetap aman.</p>
                    <a href="{{ route('profile.edit') }}" style="background: #fff7ed; color: #f97316; padding: 10px 25px; border-radius: 10px; font-weight: 700; text-decoration: none; font-size: 0.9rem;">Edit Profil</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>