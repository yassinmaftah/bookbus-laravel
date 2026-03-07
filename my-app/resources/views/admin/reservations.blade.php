<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Réservations - SATAS Bus Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('partials.admin-navbar')

    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Toutes les Réservations</h1>
                    <p class="text-gray-600 mt-2">Gérer et suivre les réservations</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
                    Retour au Dashboard
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Client</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Route</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Bus</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Date Voyage</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Places</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Statut</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Réservé le</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($reservations as $reservation)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm font-bold text-gray-900">#{{ $reservation->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $reservation->user->email }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $reservation->programme->route->nom }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->programme->bus->matricule }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $reservation->programme->jour_depart }}</td>
                                <td class="px-6 py-4 text-sm text-center font-semibold text-gray-900">{{ $reservation->nombre_places }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $reservation->status === 'payé' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50">
                    {{ $reservations->links() }}
                </div>
            </div>

        </div>
    </div>

</body>
</html>
