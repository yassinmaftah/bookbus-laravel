<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Bus - SATAS Bus Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('partials.admin-navbar')

    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Gestion des Bus</h1>
                    <p class="text-gray-600 mt-2">Flotte complète de véhicules</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
                    Retour au Dashboard
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($buses as $bus)
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                            </svg>
                        </div>
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Actif</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Bus {{ $bus->matricule }}</h3>
                    
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Capacité:</span>
                            <span class="font-semibold text-gray-900">{{ $bus->capacite }} places</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Programmes:</span>
                            <span class="font-semibold text-gray-900">{{ $bus->programmes_count }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $buses->links() }}
            </div>

        </div>
    </div>

</body>
</html>
