<nav x-data="{ open: false }" class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-orange-600">
                    SATAS<span class="text-gray-700">Bus</span>
                </a>
                <div class="hidden sm:flex sm:ml-10 sm:space-x-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('home') ? 'text-orange-600 border-b-2 border-orange-600' : 'text-gray-700 hover:text-orange-600' }}">
                        Accueil
                    </a>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-orange-600 border-b-2 border-orange-600' : 'text-gray-700 hover:text-orange-600' }}">
                        Mes Réservations
                    </a>
                    <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('about') ? 'text-orange-600 border-b-2 border-orange-600' : 'text-gray-700 hover:text-orange-600' }}">
                        À Propos
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('contact') ? 'text-orange-600 border-b-2 border-orange-600' : 'text-gray-700 hover:text-orange-600' }}">
                        Contact
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold mr-2">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show')">
                            Mon Profil
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">
                            Paramètres
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                Déconnexion
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('home') ? 'text-orange-600 bg-orange-50 border-l-4 border-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                Accueil
            </a>
            <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('dashboard') ? 'text-orange-600 bg-orange-50 border-l-4 border-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                Mes Réservations
            </a>
            <a href="{{ route('about') }}" class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('about') ? 'text-orange-600 bg-orange-50 border-l-4 border-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                À Propos
            </a>
            <a href="{{ route('contact') }}" class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('contact') ? 'text-orange-600 bg-orange-50 border-l-4 border-orange-600' : 'text-gray-700 hover:bg-gray-50' }}">
                Contact
            </a>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 flex items-center">
                <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.show') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                    Mon Profil
                </a>
                <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                    Paramètres
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
