<div class="relative z-50">
    <!-- Announcement Bar -->
    <div class="bg-black text-white text-center py-2 text-[10px] tracking-widest uppercase font-medium">
        Free shipping on all orders over $150. Returns extended to 60 days.
    </div>

<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur-md sticky top-0 border-b border-gray-100 w-full">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center mr-16">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-serif tracking-widest text-black uppercase">
                        AURA
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-10 sm:-my-px sm:flex uppercase text-[11px] tracking-[0.2em] font-medium text-black">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'border-b-2 border-black' : 'hover:text-gray-500 transition-colors' }} py-8">
                        {{ __('HOME') }}
                    </a>

                    <a href="{{ route('Bag') }}" class="{{ request()->routeIs('Bag') ? 'border-b-2 border-black' : 'hover:text-gray-500 transition-colors' }} py-8">
                        {{ __('BAG') }}
                    </a>
                    <a href="{{ route('Commande') }}" class="{{ request()->routeIs('Commande') ? 'border-b-2 border-black' : 'hover:text-gray-500 transition-colors' }} py-8">
                        {{ __('MES COMMANDES') }}
                    </a>

                    @auth
                        @if(Auth::user()->name === 'admin')
                            <a href="{{ route('gereProduct') }}" class="{{ request()->routeIs('gereProduct') ? 'border-b-2 border-black' : 'hover:text-gray-500 transition-colors' }} py-8">
                                {{ __('Manage products') }}
                            </a>
                            
                            <a href="{{ route('livraison') }}" class="{{ request()->routeIs('livraison') ? 'border-b-2 border-black' : 'hover:text-gray-500 transition-colors' }} py-8">
                                {{ __('Livraison') }}
                            </a>
                            
                            <a href="{{ route('user') }}" class="{{ request()->routeIs('user') ? 'border-b-2 border-black' : 'hover:text-gray-500 transition-colors' }} py-8">
                                {{ __('Users') }}
                            </a>
                        @endif
                    @endauth
                </div>
            </div>  

            <!-- Settings Dropdown / Login Links -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-[11px] tracking-widest uppercase font-semibold text-black hover:text-gray-500 focus:outline-none transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-6 text-[11px] font-semibold tracking-widest uppercase text-black">
                        <a href="{{ route('login') }}" class="hover:text-gray-500 transition-colors">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-gray-500 transition-colors">Register</a>
                        @endif
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('HOME') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('Bag')" :active="request()->routeIs('Bag')">
                {{ __('BAG') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('Commande')" :active="request()->routeIs('Commande')">
                {{ __('MES COMMANDES') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-6 pb-2">
                    <div class="font-semibold text-xs tracking-widest uppercase text-black flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-light text-[11px] text-gray-500 ml-6 mt-1">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                    @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
</div> <!-- End relative wrapper -->
