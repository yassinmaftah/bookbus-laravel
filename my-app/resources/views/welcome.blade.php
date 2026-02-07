<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SATAS Bus - Réservation Simple</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-800">

    <nav class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-orange-600">SATAS<span class="text-gray-700">Bus</span></div>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-600 px-3">Connexion</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-orange-600 px-3">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="bg-orange-50 py-16">
        <div class="max-w-7xl mx-auto px-4">

            <h1 class="text-3xl md:text-4xl font-bold text-center mb-8">
                Réservez vos tickets d'autocar <br>
                <span class="text-orange-600">en moins de 2 minutes</span>
            </h1>

            <div class="bg-white p-4 rounded-xl shadow-lg">
                <form action="{{ route('home') }}" method="GET" class="flex flex-col md:flex-row items-end gap-4">

                    <div class="flex-1 w-full">
                        <label class="block text-sm font-bold text-gray-500 mb-1">DE</label>
                        <div class="relative">
                            <select name="ville_depart" class="w-full border-gray-200 rounded-lg p-3 bg-gray-50 focus:ring-orange-500 focus:border-orange-500" required>
                                <option value="">Ville de départ</option>
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}" {{ request('ville_depart') == $ville->id ? 'selected' : '' }}>
                                        {{ $ville->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="hidden md:block pb-3 text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>

                    <div class="flex-1 w-full">
                        <label class="block text-sm font-bold text-gray-500 mb-1">À</label>
                        <select name="ville_arrivee" class="w-full border-gray-200 rounded-lg p-3 bg-gray-50 focus:ring-orange-500 focus:border-orange-500" required>
                            <option value="">Ville d'arrivée</option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}" {{ request('ville_arrivee') == $ville->id ? 'selected' : '' }}>
                                    {{ $ville->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full md:w-48">
                        <label class="block text-sm font-bold text-gray-500 mb-1">DÉPART</label>
                        <input type="date" name="date_voyage" value="{{ request('date_voyage') }}" class="w-full border-gray-200 rounded-lg p-3 bg-gray-50 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div class="w-full md:w-32">
                        <label class="block text-sm font-bold text-gray-500 mb-1">PASSAGERS</label>
                        <input type="number" name="passengers" value="{{ request('passengers', 1) }}" min="1" max="10" class="w-full border-gray-200 rounded-lg p-3 bg-gray-50 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div class="w-full md:w-auto">
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200 h-[50px]">
                            Recherche
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">

        @if(request()->has('ville_depart'))

            <h2 class="text-2xl font-bold mb-6">Résultats disponibles</h2>

            @if(count($voyages) > 0)
                <div class="grid gap-4">
                    @foreach($voyages as $voyage)
                        <div class="bg-white border border-gray-200 rounded-lg p-6 flex flex-col md:flex-row justify-between items-center hover:shadow-md transition">

                            <div class="text-center md:text-left mb-4 md:mb-0">
                                <div class="text-2xl font-bold text-gray-800">
                                    {{ \Carbon\Carbon::parse($voyage->heure_depart)->format('H:i') }}
                                    <span class="text-gray-400 mx-2">➔</span>
                                    {{ \Carbon\Carbon::parse($voyage->heure_arrivee)->format('H:i') }}
                                </div>
                                <div class="text-sm text-gray-500 flex items-center justify-center md:justify-start gap-2 mt-1">
                                    <span>{{ $voyage->route->nom }}</span>
                                    <span class="text-gray-300">•</span>
                                    <span class="font-medium text-orange-600">
                                        {{ intdiv($segment->duree_estimee, 60) }}h {{ $segment->duree_estimee % 60 }}min
                                    </span>
                                </div>
                            </div>

                            <div class="text-center mb-4 md:mb-0">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">SATAS First</span>
                                <div class="text-sm text-gray-500 mt-1">Bus {{ $voyage->bus->matricule }}</div>
                            </div>

                            <div class="text-center md:text-right">
                                <div class="text-3xl font-bold text-orange-600 mb-2">{{ $segment->tarif }} DH</div>
                                <a href="{{ route('reservation.form', ['id' => $voyage->id, 'passengers' => request('passengers', 1)]) }}" class="inline-block bg-orange-500 text-white px-6 py-2 rounded font-semibold hover:bg-orange-600 transition">
                                    Réserver
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-8 rounded-lg text-center border border-gray-200">
                    <div class="text-5xl mb-4">😕</div>
                    <h3 class="text-xl font-bold text-gray-700">Aucun voyage trouvé</h3>
                    <p class="text-gray-500">Essayez de changer la date ou les villes.</p>
                </div>
            @endif

        @else
            <div class="text-center mt-12 opacity-50">
                <img src="https://cdn-icons-png.flaticon.com/512/2083/2083262.png" alt="Bus" class="w-32 h-32 mx-auto mb-4 grayscale">
                <p>Où voulez-vous aller aujourd'hui ?</p>
            </div>
        @endif

    </div>

</body>
</html>
