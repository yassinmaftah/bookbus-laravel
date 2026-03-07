<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>À Propos - SATAS Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    @include('partials.navbar')

    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">À Propos de SATAS Bus</h1>
            <p class="text-xl opacity-90">Votre partenaire de confiance pour vos voyages au Maroc</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-16">
        
        <div class="grid md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Notre Histoire</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Fondée en 1985, SATAS Bus est devenue l'une des compagnies de transport routier les plus fiables du Maroc. 
                    Avec plus de 35 ans d'expérience, nous avons transporté des millions de passagers en toute sécurité.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Notre mission est de connecter les villes marocaines avec un service de qualité, ponctuel et confortable, 
                    tout en maintenant des tarifs accessibles pour tous.
                </p>
            </div>
            <div class="bg-orange-100 rounded-lg p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Nos Chiffres</h3>
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600">150+</div>
                        <div class="text-gray-600 mt-2">Bus Modernes</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600">50+</div>
                        <div class="text-gray-600 mt-2">Destinations</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600">2M+</div>
                        <div class="text-gray-600 mt-2">Passagers/An</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600">35+</div>
                        <div class="text-gray-600 mt-2">Années d'Expérience</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Nos Valeurs</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-5xl mb-4">🛡️</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Sécurité</h3>
                    <p class="text-gray-600">La sécurité de nos passagers est notre priorité absolue avec des bus entretenus régulièrement.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-5xl mb-4">⏰</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Ponctualité</h3>
                    <p class="text-gray-600">Nous respectons les horaires pour que vous arriviez à destination à l'heure prévue.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-5xl mb-4">💺</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Confort</h3>
                    <p class="text-gray-600">Des sièges confortables, climatisation et WiFi gratuit pour un voyage agréable.</p>
                </div>
            </div>
        </div>

        <div class="bg-orange-50 rounded-lg p-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Rejoignez-nous</h2>
            <p class="text-gray-600 mb-6">Réservez votre prochain voyage avec SATAS Bus et découvrez la différence.</p>
            <a href="{{ route('home') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-orange-600 transition">
                Réserver Maintenant
            </a>
        </div>

    </div>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 SATAS Bus. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
