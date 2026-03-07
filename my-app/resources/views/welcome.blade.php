<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SATAS Bus - Réservation Simple</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-800">

    @include('partials.navbar')

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

    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Ce que disent nos clients</h2>
                <p class="text-gray-600 text-lg">Des milliers de voyageurs satisfaits partagent leur expérience</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center mb-6">
                        <div class="flex text-orange-500 text-xl">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <span class="ml-2 text-sm text-gray-600 font-semibold">5.0</span>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">« Service impeccable ! J'ai voyagé de Casablanca à Marrakech et tout était parfait. Le bus était propre, confortable et le chauffeur très professionnel. La réservation en ligne est simple et rapide. Je recommande vivement ! »</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white text-lg font-bold">AM</div>
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Ahmed Mansouri</div>
                            <div class="text-sm text-gray-500">Casablanca - Voyageur fréquent</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center mb-6">
                        <div class="flex text-orange-500 text-xl">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <span class="ml-2 text-sm text-gray-600 font-semibold">5.0</span>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">« Excellente expérience avec SATAS Bus. Les horaires sont respectés, le personnel est accueillant et les prix sont très compétitifs. J'utilise leurs services depuis 3 ans et je n'ai jamais été déçue. Bravo pour le professionnalisme ! »</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white text-lg font-bold">SE</div>
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Salma El Amrani</div>
                            <div class="text-sm text-gray-500">Rabat - Cliente fidèle</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center mb-6">
                        <div class="flex text-orange-500 text-xl">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <span class="ml-2 text-sm text-gray-600 font-semibold">5.0</span>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">« Très satisfait du service. Les bus sont modernes avec WiFi et climatisation. Le système de réservation en ligne est intuitif. J'ai voyagé plusieurs fois pour le travail et c'est toujours un plaisir. Ponctualité au rendez-vous ! »</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white text-lg font-bold">YB</div>
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Youssef Bennani</div>
                            <div class="text-sm text-gray-500">Marrakech - Voyageur d'affaires</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <div class="inline-flex items-center gap-8 bg-orange-50 rounded-2xl px-12 py-6">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600">4.9/5</div>
                        <div class="text-sm text-gray-600 mt-1">Note moyenne</div>
                    </div>
                    <div class="w-px h-12 bg-orange-200"></div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600">12,500+</div>
                        <div class="text-sm text-gray-600 mt-1">Avis clients</div>
                    </div>
                    <div class="w-px h-12 bg-orange-200"></div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600">98%</div>
                        <div class="text-sm text-gray-600 mt-1">Recommandations</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-orange-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Pourquoi choisir SATAS Bus ?</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl mb-4">💳</div>
                    <h3 class="font-bold text-gray-800 mb-2">Paiement Sécurisé</h3>
                    <p class="text-gray-600 text-sm">Transactions 100% sécurisées</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl mb-4">⏰</div>
                    <h3 class="font-bold text-gray-800 mb-2">Ponctualité</h3>
                    <p class="text-gray-600 text-sm">Départs et arrivées à l'heure</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl mb-4">💺</div>
                    <h3 class="font-bold text-gray-800 mb-2">Confort</h3>
                    <p class="text-gray-600 text-sm">Sièges confortables et WiFi</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl mb-4">👥</div>
                    <h3 class="font-bold text-gray-800 mb-2">Support 24/7</h3>
                    <p class="text-gray-600 text-sm">Service client disponible</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SATAS<span class="text-orange-500">Bus</span></h3>
                    <p class="text-gray-400 text-sm">Votre partenaire de confiance pour vos voyages au Maroc depuis 1985.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Liens Rapides</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Accueil</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">À Propos</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Services</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>Réservation en ligne</li>
                        <li>Transport de colis</li>
                        <li>Voyages groupés</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>📍 Casablanca, Maroc</li>
                        <li>📞 +212 5 22 XX XX XX</li>
                        <li>✉️ contact@satasbus.ma</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 SATAS Bus. Tous droits réservés.</p>
                <div class="mt-4 space-x-4">
                    <a href="{{ route('terms') }}" class="hover:text-white">Conditions d'utilisation</a>
                    <a href="{{ route('privacy') }}" class="hover:text-white">Politique de confidentialité</a>
                    <a href="{{ route('faq') }}" class="hover:text-white">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
