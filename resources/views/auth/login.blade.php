<x-guest-layout>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #4f46e5 0%, #a855f7 100%); padding: 20px; font-family: 'Figtree', sans-serif;">
        <div style="width: 100%; max-width: 450px;">
            
            <div style="background: white; padding: 45px; border-radius: 30px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); position: relative; overflow: hidden;">
                
                <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: #f3f4f6; border-radius: 50%; z-index: 0;"></div>

                <div style="position: relative; z-index: 10;">
                    <div style="text-align: center; margin-bottom: 35px;">
                        <div style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); width: 70px; height: 70px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px auto; box-shadow: 0 10px 15px rgba(99, 102, 241, 0.3);">
                            <svg style="width: 35px; height: 35px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 style="font-size: 2rem; font-weight: 900; color: #1f2937; letter-spacing: -1px;">Selamat Datang!</h2>
                        <p style="color: #6b7280; font-size: 1rem; margin-top: 5px;">Silakan masuk ke akun Anda</p>
                    </div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div style="margin-bottom: 25px;">
                            <label for="email" style="display: block; font-weight: 700; font-size: 0.9rem; color: #374151; margin-bottom: 10px; margin-left: 5px;">EMAIL</label>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                                style="width: 100%; padding: 15px; border: 2px solid #f3f4f6; border-radius: 15px; outline: none; transition: 0.3s; background: #f9fafb; font-size: 1rem;" 
                                placeholder="nama@email.com"
                                onfocus="this.style.borderColor='#6366f1'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(99, 102, 241, 0.1)'"
                                onblur="this.style.borderColor='#f3f4f6'; this.style.background='#f9fafb'; this.style.boxShadow='none'">
                            <x-input-error :messages="$errors->get('email')" style="margin-top: 8px; font-size: 0.8rem; color: #ef4444;" />
                        </div>

                        <div style="margin-bottom: 15px;">
                            <label for="password" style="display: block; font-weight: 700; font-size: 0.9rem; color: #374151; margin-bottom: 10px; margin-left: 5px;">KATA SANDI</label>
                            <input id="password" type="password" name="password" required 
                                style="width: 100%; padding: 15px; border: 2px solid #f3f4f6; border-radius: 15px; outline: none; transition: 0.3s; background: #f9fafb; font-size: 1rem;" 
                                placeholder="••••••••"
                                onfocus="this.style.borderColor='#6366f1'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(99, 102, 241, 0.1)'"
                                onblur="this.style.borderColor='#f3f4f6'; this.style.background='#f9fafb'; this.style.boxShadow='none'">
                            <x-input-error :messages="$errors->get('password')" style="margin-top: 8px; font-size: 0.8rem; color: #ef4444;" />
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; font-size: 0.85rem;">
                            <label style="display: flex; align-items: center; cursor: pointer; color: #6b7280;">
                                <input type="checkbox" name="remember" style="margin-right: 8px; border-radius: 4px; border: 2px solid #d1d5db; color: #6366f1;">
                                Ingat Saya
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="color: #6366f1; font-weight: 600; text-decoration: none;">Lupa Sandi?</a>
                            @endif
                        </div>

                        <button type="submit" style="width: 100%; background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white; padding: 16px; border: none; border-radius: 15px; font-weight: 800; font-size: 1rem; cursor: pointer; transition: 0.3s; box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.4);"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 15px 25px -5px rgba(99, 102, 241, 0.5)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px -5px rgba(99, 102, 241, 0.4)'">
                            MASUK SEKARANG
                        </button>

                        <div style="text-align: center; margin-top: 30px; font-size: 0.9rem;">
                            <span style="color: #6b7280;">Belum punya akun?</span>
                            <a href="{{ route('register') }}" style="color: #6366f1; font-weight: 800; text-decoration: none; margin-left: 5px;">Daftar Akun</a>
                        </div>
                    </form>
                </div>
            </div>

            <p style="text-align: center; margin-top: 30px; color: rgba(255,255,255,0.7); font-size: 0.85rem;">
                &copy; {{ date('Y') }} Perpustakaan Digital. All rights reserved.
            </p>
        </div>
    </div>
</x-guest-layout>