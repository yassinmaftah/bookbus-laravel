<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - SATAS Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-orange-50 min-h-screen">
    
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-6xl">
            
            <div class="text-center mb-8 opacity-0" style="animation: fadeInDown 0.6s ease-out forwards;">
                <a href="{{ route('home') }}" class="inline-block">
                    <h1 class="text-4xl font-bold text-orange-600">SATAS<span class="text-gray-800">Bus</span></h1>
                </a>
                <p class="text-gray-600 mt-2">Connectez-vous pour gérer vos réservations</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center">
                
                <div class="bg-white rounded-3xl shadow-2xl p-10 opacity-0" style="animation: slideInLeft 0.8s ease-out 0.2s forwards;">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Bon retour !</h2>
                    <p class="text-gray-600 mb-8">Entrez vos identifiants pour continuer</p>

                    @if (session('status'))
                        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700">Adresse Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                    class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                    placeholder="votre@email.com">
                            </div>
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Mot de passe</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input id="password" type="password" name="password" required autocomplete="current-password"
                                    class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                    placeholder="Votre mot de passe">
                            </div>
                            @error('password')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500 cursor-pointer">
                                <span class="ml-2 text-sm text-gray-700">Se souvenir de moi</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-orange-600 hover:text-orange-700 font-medium transition">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-4 rounded-xl hover:from-orange-600 hover:to-orange-700 transform hover:scale-[1.02] transition duration-200 shadow-lg hover:shadow-xl">
                            Se connecter
                        </button>

                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Nouveau sur SATAS Bus ?</span>
                            </div>
                        </div>

                        <a href="{{ route('register') }}" class="block w-full text-center bg-white border-2 border-orange-500 text-orange-600 font-bold py-4 rounded-xl hover:bg-orange-50 transition duration-200">
                            Créer un compte
                        </a>

                        <div class="text-center mt-6">
                            <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-900 transition">
                                <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Retour à l'accueil
                            </a>
                        </div>
                    </form>
                </div>

                <div class="hidden md:block opacity-0" style="animation: slideInRight 0.8s ease-out 0.4s forwards;">
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-12 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
                        
                        <div class="relative z-10">
                            <h3 class="text-3xl font-bold mb-6">Pourquoi SATAS Bus ?</h3>
                            
                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg mb-1">Réservation instantanée</h4>
                                        <p class="text-orange-100">Réservez vos billets en moins de 2 minutes</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg mb-1">Paiement sécurisé</h4>
                                        <p class="text-orange-100">Transactions 100% sécurisées et cryptées</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg mb-1">Support 24/7</h4>
                                        <p class="text-orange-100">Notre équipe est toujours là pour vous aider</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg mb-1">Ponctualité garantie</h4>
                                        <p class="text-orange-100">Départs et arrivées à l'heure prévue</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 pt-8 border-t border-white border-opacity-20">
                                <p class="text-orange-100 text-sm">Plus de 2 millions de passagers nous font confiance chaque année</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>

</body>
</html>
