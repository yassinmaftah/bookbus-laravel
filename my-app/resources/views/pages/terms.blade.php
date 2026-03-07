<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conditions Générales - SATAS Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    @include('partials.navbar')

    <div class="max-w-4xl mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Conditions Générales d'Utilisation</h1>
        
        <div class="bg-white rounded-xl shadow-lg p-8 space-y-6">
            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Acceptation des Conditions</h2>
                <p class="text-gray-700">En utilisant le site SATAS Bus, vous acceptez les présentes conditions générales d'utilisation.</p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Réservation</h2>
                <p class="text-gray-700 mb-2">Les réservations sont confirmées après paiement complet. Vous recevrez un email de confirmation avec votre billet électronique.</p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Annulation et Remboursement</h2>
                <ul class="list-disc ml-6 text-gray-700 space-y-2">
                    <li>Plus de 24h avant le départ : Remboursement intégral</li>
                    <li>Entre 12h et 24h avant : Remboursement de 50%</li>
                    <li>Moins de 12h avant : Aucun remboursement</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Bagages</h2>
                <p class="text-gray-700">Chaque passager a droit à 1 bagage en soute (max 20kg) et 1 bagage à main. Les bagages supplémentaires sont facturés.</p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Responsabilité</h2>
                <p class="text-gray-700">SATAS Bus s'engage à assurer le transport dans les meilleures conditions de sécurité et de confort.</p>
            </section>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('privacy') }}" class="text-orange-600 hover:text-orange-700 font-semibold">Politique de Confidentialité</a>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 SATAS Bus. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
