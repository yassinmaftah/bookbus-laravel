<nav class="bg-white shadow-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold">
                        <span class="text-orange-600">SATAS</span><span class="text-gray-800">Bus</span>
                    </span>
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg font-medium">Accueil</a>
                <a href="{{ route('about') }}" class="px-4 py-2 text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg font-medium">À propos</a>
                <a href="{{ route('faq') }}" class="px-4 py-2 text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg font-medium">FAQ</a>
                <a href="{{ route('contact') }}" class="px-4 py-2 text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg font-medium">Contact</a>
                @auth
                    <div class="w-px h-6 bg-gray-200 mx-2"></div>
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg font-medium">Mes Réservations</a>
                    <a href="{{ route('profile.show') }}" class="px-4 py-2 text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg font-medium">Profil</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-purple-600 hover:text-purple-700 hover:bg-purple-50 rounded-lg font-semibold flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <span>Admin</span>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg font-medium">Déconnexion</button>
                    </form>
                @else
                    <div class="w-px h-6 bg-gray-200 mx-2"></div>
                    <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg font-medium">Connexion</a>
                    <a href="{{ route('register') }}" class="ml-2 px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg font-semibold hover:from-orange-600 hover:to-orange-700 shadow-md">Inscription</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
