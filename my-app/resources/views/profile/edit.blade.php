<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil - SATAS Bus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(30px); } to { opacity: 1; transform: translateX(0); } }
        .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; }
        .animate-slide-in { animation: slideIn 0.6s ease-out forwards; }
    </style>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')

    <div class="min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <a href="{{ route('profile.show') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour au profil
                </a>
                <h1 class="text-4xl font-bold text-gray-900">Modifier le profil</h1>
                <p class="text-gray-600 mt-2">Mettez à jour vos informations personnelles</p>
            </div>

            <div class="space-y-6">
                
                <div class="bg-white rounded-2xl shadow-lg p-8 opacity-0 animate-slide-in" style="animation-delay: 0.2s;">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Informations du profil
                    </h2>

                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nom complet</label>
                            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Adresse Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold px-8 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transform hover:scale-105 transition duration-200 shadow-lg">
                                Enregistrer les modifications
                            </button>
                            <a href="{{ route('profile.show') }}" class="text-gray-600 hover:text-gray-900 font-semibold">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 opacity-0 animate-slide-in" style="animation-delay: 0.3s;">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Changer le mot de passe
                    </h2>

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-2">Mot de passe actuel</label>
                            <input id="current_password" type="password" name="current_password" autocomplete="current-password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200">
                            @error('current_password', 'updatePassword')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Nouveau mot de passe</label>
                            <input id="password" type="password" name="password" autocomplete="new-password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200">
                            @error('password', 'updatePassword')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirmer le mot de passe</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200">
                        </div>

                        <button type="submit" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold px-8 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transform hover:scale-105 transition duration-200 shadow-lg">
                            Mettre à jour le mot de passe
                        </button>
                    </form>
                </div>

                <div class="bg-red-50 border-2 border-red-200 rounded-2xl shadow-lg p-8 opacity-0 animate-slide-in" style="animation-delay: 0.4s;">
                    <h2 class="text-2xl font-bold text-red-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        Zone dangereuse
                    </h2>
                    <p class="text-red-700 mb-6">Une fois votre compte supprimé, toutes vos données seront définitivement effacées.</p>

                    <button onclick="document.getElementById('deleteModal').classList.remove('hidden')" 
                        class="bg-red-600 text-white font-bold px-6 py-3 rounded-lg hover:bg-red-700 transition duration-200">
                        Supprimer le compte
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 transform transition-all">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Confirmer la suppression</h3>
            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>

            <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('DELETE')

                <div>
                    <label for="delete_password" class="block text-sm font-semibold text-gray-700 mb-2">Mot de passe</label>
                    <input id="delete_password" type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    @error('password', 'userDeletion')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-red-600 text-white font-bold py-3 rounded-lg hover:bg-red-700 transition duration-200">
                        Supprimer
                    </button>
                    <button type="button" onclick="document.getElementById('deleteModal').classList.add('hidden')"
                        class="flex-1 bg-gray-200 text-gray-700 font-bold py-3 rounded-lg hover:bg-gray-300 transition duration-200">
                        Annuler
                    </button>
                </div>
            </form>
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
