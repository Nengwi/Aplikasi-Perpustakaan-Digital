<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div class="p-2 bg-blue-600 rounded-xl shadow-lg shadow-blue-200">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="font-black text-xl tracking-tighter text-slate-900 uppercase">Perpustakaan<span class="text-blue-600">Digital</span></span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-black uppercase tracking-widest">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::user()->role === 'admin') 
                        <x-nav-link :href="route('buku.index')" :active="request()->routeIs('buku.*')" class="text-sm font-black uppercase tracking-widest">
                            {{ __('Kelola Buku') }}
                        </x-nav-link>

                        <x-nav-link :href="route('anggota.index')" :active="request()->routeIs('anggota.*')" class="text-sm font-black uppercase tracking-widest">
                            {{ __('Kelola Anggota') }}
                        </x-nav-link>
                    @endif
                    
                    </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border-2 border-slate-100 text-sm leading-4 font-bold rounded-2xl text-slate-900 bg-slate-50 hover:bg-white hover:border-blue-200 focus:outline-none transition-all duration-300 shadow-sm">
                            <div class="relative inline-block h-9 w-9 mr-3">
                                <img class="h-full w-full rounded-xl object-cover border-2 border-white shadow-sm" 
                                     src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=FFFFFF&background={{ Auth::user()->role === 'admin' ? '2563eb' : '6366f1' }}" 
                                     alt="{{ Auth::user()->name }}" />
                                <span class="absolute -bottom-1 -right-1 block h-3 w-3 rounded-full bg-emerald-500 ring-2 ring-white"></span>
                            </div>

                            <div class="text-left hidden md:block">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-tighter -mb-1">
                                    {{ Auth::user()->role === 'admin' ? 'Petugas Admin' : 'Anggota Perpustakaan' }}
                                </p>
                                <div class="text-slate-900 font-black">{{ Auth::user()->name }}</div>
                            </div>

                            <div class="ms-3 text-slate-400">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="p-2">
                            <div class="px-4 py-3 mb-1 bg-slate-50 rounded-xl">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Detail Akun</p>
                            </div>
                            
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center px-3 py-3 rounded-xl hover:bg-blue-50 transition-colors group">
                                <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span class="font-bold text-slate-700">Manajemen Profil</span>
                            </x-dropdown-link>

                            <div class="h-px bg-slate-100 my-2"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="flex items-center px-3 py-3 rounded-xl hover:bg-rose-50 transition-colors group">
                                    <div class="p-2 bg-rose-100 text-rose-600 rounded-lg mr-3 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-rose-600">Keluar Sistem</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>