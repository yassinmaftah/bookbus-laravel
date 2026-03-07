<nav class="bg-gradient-to-r from-purple-600 to-purple-700 shadow-lg border-b border-purple-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white">SATAS<span class="text-purple-200">Bus</span></span>
                </a>
                <span class="px-3 py-1 bg-purple-800 text-purple-100 text-xs font-bold rounded-full uppercase tracking-wide">Admin Panel</span>
            </div>
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-purple-100 hover:text-white hover:bg-purple-800 rounded-lg font-medium">Accueil</a>
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-white bg-purple-800 rounded-lg font-semibold">Dashboard</a>
                <a href="{{ route('admin.reservations') }}" class="px-4 py-2 text-purple-100 hover:text-white hover:bg-purple-800 rounded-lg font-medium">Réservations</a>
                <a href="{{ route('admin.buses') }}" class="px-4 py-2 text-purple-100 hover:text-white hover:bg-purple-800 rounded-lg font-medium">Bus</a>
                <a href="{{ route('admin.routes') }}" class="px-4 py-2 text-purple-100 hover:text-white hover:bg-purple-800 rounded-lg font-medium">Routes</a>
                <div class="w-px h-6 bg-purple-500 mx-2"></div>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 text-purple-100 hover:text-white hover:bg-purple-800 rounded-lg font-medium">Mon Compte</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-purple-100 hover:text-white hover:bg-red-600 rounded-lg font-medium">Déconnexion</button>
                </form>
            </div>
        </div>
    </div>
</nav>
