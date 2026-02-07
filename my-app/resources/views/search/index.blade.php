<x-guest-layout>
    <div class="relative bg-indigo-700 pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-10 text-center">
            <h1 class="text-4xl font-extrabold text-white tracking-tight">
                Voyagez confortablement avec SATAS
            </h1>
            <p class="mt-4 text-xl text-indigo-100">
                Réservez vos tickets de bus en quelques clics.
            </p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-10">
        <div class="bg-white rounded-lg shadow-xl p-6 sm:p-8">
            <form action="{{ route('home') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Départ</label>
                        <select name="ville_depart" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="">Ville de départ</option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}" {{ (isset($searchData['ville_depart']) && $searchData['ville_depart'] == $ville->id) ? 'selected' : '' }}>
                                    {{ $ville->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Arrivée</label>
                        <select name="ville_arrivee" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="">Ville d'arrivée</option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}" {{ (isset($searchData['ville_arrivee']) && $searchData['ville_arrivee'] == $ville->id) ? 'selected' : '' }}>
                                    {{ $ville->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-1 grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <input type="date" name="date_voyage" value="{{ $searchData['date_voyage'] ?? '' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Voyageurs</label>
                            <input type="number" name="passengers" min="1" max="10" value="{{ $searchData['passengers'] ?? 1 }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="col-span-1">
                        <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 h-[42px]">
                            Rechercher
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if(request()->has('ville_depart'))

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Résultats disponibles</h2>

            @if($results->isEmpty())
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                Aucun voyage trouvé pour ce trajet à cette date. Essayez une autre date ?
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($results as $trip)
                        <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition duration-200 p-6 flex flex-col sm:flex-row justify-between items-center group">

                            <div class="flex flex-col items-center sm:items-start mb-4 sm:mb-0 w-full sm:w-1/3">
                                <div class="flex items-center space-x-2 text-gray-900">
                                    <span class="text-2xl font-bold">{{ substr($trip->heure_depart, 0, 5) }}</span>
                                    <span class="text-gray-400">➔</span>
                                    <span class="text-2xl font-bold">{{ substr($trip->heure_arrivee, 0, 5) }}</span>
                                </div>
                                <span class="text-sm text-gray-500 mt-1">Durée: Calculée auto</span>
                            </div>

                            <div class="flex flex-col items-center mb-4 sm:mb-0 w-full sm:w-1/3 border-l border-r border-gray-100 px-4">
                                <span class="font-semibold text-gray-800">{{ $trip->route->nom }}</span>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                                    Bus {{ $trip->bus->matricule }}
                                </div>
                            </div>

                            <div class="flex flex-col items-center sm:items-end w-full sm:w-1/3">
                                <span class="text-3xl font-bold text-indigo-600">120 MAD</span>
                                <span class="text-xs text-gray-400 mb-2">par personne</span>

                                <button class="bg-indigo-600 text-white px-6 py-2 rounded-full font-medium hover:bg-indigo-700 transition w-full sm:w-auto">
                                    Sélectionner
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        @else
            <div class="text-center text-gray-500 mt-10">
                <p>Remplissez le formulaire ci-dessus pour voir les horaires.</p>
            </div>
        @endif
    </div>
</x-guest-layout>
