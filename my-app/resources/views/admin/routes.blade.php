<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Routes - SATAS Bus Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('partials.admin-navbar')

    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Gestion des Routes</h1>
                    <p class="text-gray-600 mt-2">Tous les itinéraires disponibles</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
                    Retour au Dashboard
                </a>
            </div>

            <div class="space-y-4">
                @foreach($routes as $route)
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $route->nom }}</h3>
                        <span class="px-4 py-2 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full">
                            {{ $route->segments->count() }} segments
                        </span>
                    </div>
                    
                    @if($route->segments->isNotEmpty())
                    <div class="grid md:grid-cols-3 gap-4 mt-4">
                        @foreach($route->segments as $segment)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                                <span class="font-semibold text-gray-900">Segment {{ $segment->ordre }}</span>
                            </div>
                            <div class="text-sm space-y-1">
                                <p class="text-gray-600">Durée: <span class="font-semibold">{{ intdiv($segment->duree_estimee, 60) }}h {{ $segment->duree_estimee % 60 }}min</span></p>
                                <p class="text-gray-600">Distance: <span class="font-semibold">{{ $segment->distance_km }} km</span></p>
                                <p class="text-orange-600 font-bold">{{ $segment->tarif }} DH</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $routes->links() }}
            </div>

        </div>
    </div>

</body>
</html>
