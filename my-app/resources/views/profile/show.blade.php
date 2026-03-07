<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - SATAS Bus</title>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl font-bold text-gray-900">Mon Profil</h1>
                <p class="text-gray-600 mt-2">Gérez vos informations personnelles</p>
            </div>

            @if (session('status') === 'profile-updated')
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-green-700 font-medium">Profil mis à jour avec succès</p>
                    </div>
                </div>
            @endif

            <div class="grid md:grid-cols-3 gap-6">
                
                <div class="md:col-span-1 opacity-0 animate-slide-in" style="animation-delay: 0.3s;">
                    <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                        <div class="w-32 h-32 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full mx-auto mb-6 flex items-center justify-center text-white text-5xl font-bold shadow-xl">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $user->name }}</h2>
                        <p class="text-gray-600 mb-6">{{ $user->email }}</p>
                        
                        <div class="space-y-3">
                            <a href="{{ route('profile.edit') }}" class="block w-full bg-orange-500 text-white font-semibold py-3 rounded-lg hover:bg-orange-600 transition duration-200 transform hover:scale-105">
                                Modifier le profil
                            </a>
                            <a href="{{ route('dashboard') }}" class="block w-full bg-gray-100 text-gray-700 font-semibold py-3 rounded-lg hover:bg-gray-200 transition duration-200">
                                Mes réservations
                            </a>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 space-y-6">
                    
                    <div class="bg-white rounded-2xl shadow-lg p-8 opacity-0 animate-slide-in" style="animation-delay: 0.4s;">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informations personnelles
                        </h3>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Nom complet</label>
                                <p class="text-lg font-medium text-gray-900 mt-1">{{ $user->name }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Email</label>
                                <p class="text-lg font-medium text-gray-900 mt-1">{{ $user->email }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Membre depuis</label>
                                <p class="text-lg font-medium text-gray-900 mt-1">{{ $user->created_at->format('d/m/Y') }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Statut</label>
                                <p class="text-lg font-medium text-green-600 mt-1 flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Actif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-8 opacity-0 animate-slide-in" style="animation-delay: 0.5s;">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Sécurité du compte
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Email vérifié</p>
                                        <p class="text-sm text-gray-600">Votre adresse email est confirmée</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Mot de passe</p>
                                        <p class="text-sm text-gray-600">Dernière modification récente</p>
                                    </div>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="text-orange-600 hover:text-orange-700 font-semibold text-sm">
                                    Modifier
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
