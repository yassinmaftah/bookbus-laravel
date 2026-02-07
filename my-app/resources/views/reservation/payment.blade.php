@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
            <h2 class="text-xl font-bold mb-4">Récapitulatif</h2>
            <div class="space-y-3">
                <p><span class="text-gray-500">Voyage:</span> <strong>{{ $programme->route->nom }}</strong></p>
                <p><span class="text-gray-500">Date:</span> {{ $programme->jour_depart }} à {{ substr($programme->heure_depart, 0, 5) }}</p>
                <p><span class="text-gray-500">Bus:</span> {{ $programme->bus->matricule }}</p>
                <hr>
                <p><span class="text-gray-500">Passagers:</span> {{ $passengers }} personne(s)</p>
                <p class="text-xl font-bold text-orange-600 mt-2">Total à payer: {{ $total }} DH</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                <span>💳</span> Paiement sécurisé
            </h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Oups!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('reservation.process') }}" method="POST">
                @csrf
                <input type="hidden" name="programme_id" value="{{ $programme->id }}">
                <input type="hidden" name="passengers" value="{{ $passengers }}">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Titulaire de la carte</label>
                    <input type="text" name="card_holder" class="w-full border p-2 rounded" placeholder="Ex: MOHAMED ALAMI" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Numéro de carte</label>
                    <input type="text" name="card_number" maxlength="16" class="w-full border p-2 rounded" placeholder="1234 5678 1234 5678" >
                </div>

                <div class="flex gap-4 mb-6">
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Expiration</label>
                        <input type="month" name="expiry_date" class="w-full border p-2 rounded" >
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">CVV</label>
                        <input type="text" name="cvv" maxlength="3" class="w-full border p-2 rounded" placeholder="123" >
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded hover:bg-green-700 transition">
                    Payer & Réserver
                </button>
                <p class="text-xs text-gray-400 text-center mt-2">🔒 Paiement simulé (Aucun débit réel)</p>
            </form>
        </div>
    </div>
</div>
@endsection
