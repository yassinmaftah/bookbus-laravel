@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-16 px-4">
    <div class="bg-white p-8 rounded-xl shadow-lg border-t-4 border-green-500 text-center">

        <div class="text-7xl mb-4">🎉</div>

        <h1 class="text-3xl font-bold text-gray-800 mb-2">Paiement Réussi !</h1>
        <p class="text-gray-500 mb-8">Votre réservation a été confirmée avec succès.</p>

        <div class="bg-gray-50 p-6 rounded-lg text-left inline-block w-full md:w-2/3 mb-8 border border-gray-200">
            <div class="flex justify-between mb-2">
                <span class="text-gray-500">Référence:</span>
                <span class="font-bold">#{{ $reservation->id }}</span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-500">Voyage:</span>
                <span class="font-bold">{{ $reservation->programme->route->nom }}</span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-500">Date:</span>
                <span class="font-bold">{{ $reservation->programme->jour_depart }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Total payé:</span>
                <span class="font-bold text-green-600">
                    {{ $reservation->programme->route->segments->first()->tarif * $reservation->nombre_places }} DH
                </span>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center gap-4">

            <a href="{{ route('ticket.download', $reservation->id) }}"
               class="flex items-center justify-center gap-2 bg-orange-500 text-white px-6 py-3 rounded-lg font-bold shadow hover:bg-orange-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Télécharger le Ticket (PDF)
            </a>

            <a href="{{ url('/') }}"
               class="flex items-center justify-center gap-2 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-bold border border-gray-300 hover:bg-gray-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Retour à l'accueil
            </a>

        </div>

    </div>
</div>
@endsection
