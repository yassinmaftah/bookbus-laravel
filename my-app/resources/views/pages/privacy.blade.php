<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Politique de Confidentialité - SATAS Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    @include('partials.navbar')

    <div class="max-w-4xl mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Politique de Confidentialité</h1>
        
        <div class="bg-white rounded-xl shadow-lg p-8 space-y-6">
            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Collecte des Données</h2>
                <p class="text-gray-700">Nous collectons les informations suivantes : nom, email, numéro de téléphone lors de la réservation.</p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Utilisation des Données</h2>
                <p class="text-gray-700 mb-2">Vos données sont utilisées pour :</p>
                <ul class="list-disc ml-6 text-gray-700 space-y-2">
                    <li>Traiter vos réservations</li>
                    <li>Vous envoyer des confirmations et notifications</li>
                    <li>Améliorer nos services</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Protection des Données</h2>
                <p class="text-gray-700">Nous utilisons des mesures de sécurité avancées pour protéger vos informations personnelles.</p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Partage des Données</h2>
                <p class="text-gray-700">Nous ne vendons ni ne partageons vos données personnelles avec des tiers sans votre consentement.</p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Vos Droits</h2>
                <p class="text-gray-700">Vous avez le droit d'accéder, modifier ou supprimer vos données personnelles à tout moment.</p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Contact</h2>
                <p class="text-gray-700">Pour toute question concernant vos données, contactez-nous à : privacy@satasbus.ma</p>
            </section>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('terms') }}" class="text-orange-600 hover:text-orange-700 font-semibold">Conditions Générales</a>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 SATAS Bus. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
