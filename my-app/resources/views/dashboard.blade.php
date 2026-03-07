<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations - SATAS Bus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .animate-fadeIn { animation: fadeIn 0.5s ease-out; }
        .animate-slideUp { animation: slideUp 0.6s ease-out; }
    </style>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')

    <div class="py-12 animate-fadeIn">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Mes Réservations</h1>
                <p class="text-gray-600 mt-2">Gérez vos réservations et téléchargez vos tickets</p>
            </div>

            <div class="mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-white hover:bg-orange-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nouvelle Réservation
                </a>
            </div>

            @if($reservations->count() > 0)
                <div class="grid gap-6">
                    @foreach($reservations as $reservation)
                        <div class="bg-white overflow-hidden shadow-sm rounded-lg border-l-4 border-orange-500 animate-slideUp">
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="text-2xl font-bold text-gray-800">{{ $reservation->programme->route->nom }}</span>
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $reservation->status === 'payé' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ ucfirst($reservation->status) }}
                                            </span>
                                        </div>
                                        <div class="text-sm text-gray-600 space-y-1">
                                            <p><strong>Date de départ:</strong> {{ $reservation->programme->jour_depart }} à {{ substr($reservation->programme->heure_depart, 0, 5) }}</p>
                                            <p><strong>Bus:</strong> {{ $reservation->programme->bus->matricule }}</p>
                                            <p><strong>Passagers:</strong> {{ $reservation->nombre_places }} personne(s)</p>
                                            <p><strong>Réservé le:</strong> {{ $reservation->created_at->format('d/m/Y à H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center md:text-right">
                                        <div class="text-3xl font-bold text-orange-600 mb-3">
                                            {{ $reservation->programme->route->segments->first()->tarif * $reservation->nombre_places }} DH
                                        </div>
                                        <a href="{{ route('ticket.download', $reservation->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Télécharger Ticket
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm rounded-lg animate-slideUp">
                    <div class="p-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">Aucune réservation</h3>
                        <p class="text-gray-500 mb-6">Vous n'avez pas encore effectué de réservation.</p>
                        <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 border border-transparent rounded-md font-semibold text-white hover:bg-orange-600 transition">
                            Rechercher un voyage
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2024 SATAS Bus. Tous droits réservés.</p>
            <div class="mt-4 space-x-4">
                <a href="{{ route('terms') }}" class="text-gray-400 hover:text-white">Conditions d'utilisation</a>
                <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white">Politique de confidentialité</a>
            </div>
        </div>
    </footer>
</body>
</html>
