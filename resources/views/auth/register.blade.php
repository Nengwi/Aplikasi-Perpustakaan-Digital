<x-guest-layout>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #4f46e5 0%, #a855f7 100%); padding: 40px 20px; font-family: 'Figtree', sans-serif;">
        <div style="width: 100%; max-width: 500px;">
            
            <div style="background: white; padding: 40px; border-radius: 30px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); position: relative; overflow: hidden;">
                
                <div style="position: absolute; top: -40px; left: -40px; width: 120px; height: 120px; background: #f3f4f6; border-radius: 50%; z-index: 0;"></div>

                <div style="position: relative; z-index: 10;">
                    <div style="text-align: center; margin-bottom: 30px;">
                        <div style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); width: 60px; height: 60px; border-radius: 18px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px auto;">
                            <svg style="width: 30px; height: 30px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <h2 style="font-size: 1.8rem; font-weight: 900; color: #1f2937; letter-spacing: -1px;">Daftar Akun Baru</h2>
                        <p style="color: #6b7280; font-size: 0.95rem; margin-top: 5px;">Bergabunglah untuk mulai meminjam buku</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #374151; margin-bottom: 8px; margin-left: 5px;">NAMA LENGKAP</label>
                            <input type="text" name="name" :value="old('name')" required autofocus 
                                style="width: 100%; padding: 14px; border: 2px solid #f3f4f6; border-radius: 12px; outline: none; transition: 0.3s; background: #f9fafb;" 
                                placeholder="Masukkan nama Anda"
                                onfocus="this.style.borderColor='#6366f1'; this.style.background='white';"
                                onblur="this.style.borderColor='#f3f4f6'; this.style.background='#f9fafb';">
                            <x-input-error :messages="$errors->get('name')" style="margin-top: 5px; font-size: 0.8rem;" />
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #374151; margin-bottom: 8px; margin-left: 5px;">EMAIL</label>
                            <input type="email" name="email" :value="old('email')" required 
                                style="width: 100%; padding: 14px; border: 2px solid #f3f4f6; border-radius: 12px; outline: none; transition: 0.3s; background: #f9fafb;" 
                                placeholder="nama@email.com"
                                onfocus="this.style.borderColor='#6366f1'; this.style.background='white';"
                                onblur="this.style.borderColor='#f3f4f6'; this.style.background='#f9fafb';">
                            <x-input-error :messages="$errors->get('email')" style="margin-top: 5px; font-size: 0.8rem;" />
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #374151; margin-bottom: 8px; margin-left: 5px;">KATA SANDI</label>
                            <input type="password" name="password" required 
                                style="width: 100%; padding: 14px; border: 2px solid #f3f4f6; border-radius: 12px; outline: none; transition: 0.3s; background: #f9fafb;" 
                                placeholder="Minimal 8 karakter"
                                onfocus="this.style.borderColor='#6366f1'; this.style.background='white';"
                                onblur="this.style.borderColor='#f3f4f6'; this.style.background='#f9fafb';">
                            <x-input-error :messages="$errors->get('password')" style="margin-top: 5px; font-size: 0.8rem;" />
                        </div>

                        <div style="margin-bottom: 30px;">
                            <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #374151; margin-bottom: 8px; margin-left: 5px;">KONFIRMASI KATA SANDI</label>
                            <input type="password" name="password_confirmation" required 
                                style="width: 100%; padding: 14px; border: 2px solid #f3f4f6; border-radius: 12px; outline: none; transition: 0.3s; background: #f9fafb;" 
                                placeholder="Ulangi kata sandi"
                                onfocus="this.style.borderColor='#6366f1'; this.style.background='white';"
                                onblur="this.style.borderColor='#f3f4f6'; this.style.background='#f9fafb';">
                            <x-input-error :messages="$errors->get('password_confirmation')" style="margin-top: 5px; font-size: 0.8rem;" />
                        </div>

                        <button type="submit" style="width: 100%; background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white; padding: 16px; border: none; border-radius: 15px; font-weight: 800; font-size: 1rem; cursor: pointer; transition: 0.3s; box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.4);"
                            onmouseover="this.style.transform='translateY(-2px)';"
                            onmouseout="this.style.transform='translateY(0)';"
                        >
                            DAFTAR SEKARANG
                        </button>

                        <div style="text-align: center; margin-top: 25px; font-size: 0.9rem;">
                            <span style="color: #6b7280;">Sudah punya akun?</span>
                            <a href="{{ route('login') }}" style="color: #6366f1; font-weight: 800; text-decoration: none; margin-left: 5px;">Masuk di sini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>