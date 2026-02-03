<section class="relative">
    <div class="absolute -top-6 -right-6 opacity-10">
        <svg class="w-32 h-32 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
        </svg>
    </div>

    <header class="flex items-center space-x-4 mb-8">
        <div class="p-3 bg-indigo-100 rounded-2xl text-indigo-600 shadow-sm border border-indigo-200">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-black text-slate-900 leading-tight uppercase tracking-tight">
                {{ __('Informasi Profil') }}
            </h2>
            <p class="mt-1 text-sm font-bold text-slate-500 italic">
                {{ __("Perbarui data diri admin dan alamat email kamu.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-7">
        @csrf
        @method('patch')

        <div class="group">
            <x-input-label for="name" class="text-xs font-black text-slate-900 uppercase tracking-widest mb-2 ml-1" :value="__('Nama Lengkap')" />
            <x-text-input id="name" name="name" type="text" 
                class="mt-1 block w-full px-5 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-indigo-600 focus:bg-white focus:ring-0 transition-all font-bold text-slate-900 shadow-inner" 
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 ml-2" :messages="$errors->get('name')" />
        </div>

        <div class="group">
            <x-input-label for="email" class="text-xs font-black text-slate-900 uppercase tracking-widest mb-2 ml-1" :value="__