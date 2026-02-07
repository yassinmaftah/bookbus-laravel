<x-guest-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h2 class="text-xl font-bold mb-4 text-center">Rechercher un Voyage</h2>

                <form action="/search-result" method="POST" class="flex flex-col gap-4">
                    @csrf <div>
                        <label class="block font-medium">Ville de Départ</label>
                        <select name="ville_depart" class="w-full border-gray-300 rounded p-2">
                            <option value="">Choisir...</option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium">Ville d'Arrivée</label>
                        <select name="ville_arrivee" class="w-full border-gray-300 rounded p-2">
                            <option value="">Choisir...</option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium">Date</label>
                        <input type="date" name="date_voyage" class="w-full border-gray-300 rounded p-2">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Rechercher
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
