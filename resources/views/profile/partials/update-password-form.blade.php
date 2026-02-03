<section class="relative">
    <div class="absolute -top-6 -right-6 opacity-10 group-hover:opacity-20 transition-opacity">
        <svg class="w-24 h-24 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M2.166 4.9L10 .155 17.834 4.9a2 2 0 011.166 1.812v3.52c0 5.252-3.601 9.941-8.641 11.269a2 2 0 01-.718 0C4.601 20.187 1 15.498 1 10.247V6.712A2 2 0 012.166 4.9zM10 5a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
    </div>

    <header class="flex items-center space-x-4 mb-8">
        <div class="p-3 bg-blue-100 rounded-2xl text-blue-600 shadow-sm">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-black text-slate-900 leading-tight uppercase tracking-tight">
                {{ __('Update Password') }}
            </h2>
            <p class="mt-1 text-sm font-bold text-slate-500 italic">
                {{ __('Pastikan akun admin tetap aman dengan password yang kuat.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-7">
        @csrf
        @method('put')

        <div class="group">
            <x-input-label for="update_password_current_password" class="text-xs font-black text-slate-900 uppercase tracking-widest mb-2 ml-1" :value="__('Password Saat Ini')" />
            <div class="relative">
                <x-text-input id="update_password_current_password" name="current_password" type="password" 
                    class="mt-1 block w-full px-5 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all font-bold text-slate-900 shadow-inner" 
                    autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 ml-2" />
        </div>

        <div class="group">
            <x-input-label for="update_password_password" class="text-xs font-black text-slate-900 uppercase tracking-widest mb-2 ml-1" :value="__('Password Baru')" />
            <x-text-input id="update_password_password" name="password" type="password" 
                class="mt-1 block w-full px-5 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all font-bold text-slate-900 shadow-inner" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 ml-2" />
        </div>

        <div class="group">
            <x-input-label for="update_password_password_confirmation" class="text-xs font-black text-slate-900 uppercase tracking-widest mb-2 ml-1" :value="__('Konfirmasi Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="mt-1 block w-full px-5 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-blue-600 focus:bg-white focus:ring-0 transition-all font-bold text-slate-900 shadow-inner" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 ml-2" />
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit" class="inline-flex items-center px-10 py-4 bg-slate-900 hover:bg-blue-600 text-white text-xs font-black rounded-2xl shadow-xl shadow-slate-200 transition-all duration-300 transform hover:-translate-y-1 uppercase tracking-widest">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ __('Simpan Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                    class="flex items-center text-emerald-600 font-black text-sm uppercase tracking-tighter">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Berhasil Diperbarui') }}
                </div>
            @endif
        </div>
    </form>
</section>