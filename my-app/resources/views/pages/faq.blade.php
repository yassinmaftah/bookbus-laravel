<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ - SATAS Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    @include('partials.navbar')

    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Questions Fréquentes</h1>
            <p class="text-xl opacity-90">Trouvez rapidement des réponses à vos questions</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-16">
        
        <div class="space-y-4">
            
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <button onclick="toggleFaq(1)" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                    <span class="font-bold text-lg text-gray-900">Comment réserver un billet ?</span>
                    <svg id="icon-1" class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq-1" class="hidden px-6 pb-5 text-gray-700">
                    <p>Pour réserver un billet, suivez ces étapes simples :</p>
                    <ol class="list-decimal ml-5 mt-2 space-y-1">
                        <li>Sélectionnez votre ville de départ et d'arrivée</li>
                        <li>Choisissez la date de voyage</li>
                        <li>Cliquez sur "Rechercher"</li>
                        <li>Sélectionnez le voyage qui vous convient</li>
                        <li>Remplissez vos informations de paiement</li>
                        <li>Confirmez votre réservation</li>
                    </ol>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <button onclick="toggleFaq(2)" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                    <span class="font-bold text-lg text-gray-900">Quels sont les moyens de paiement acceptés ?</span>
                    <svg id="icon-2" class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq-2" class="hidden px-6 pb-5 text-gray-700">
                    <p>Nous acceptons les moyens de paiement suivants :</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>Cartes bancaires (Visa, Mastercard)</li>
                        <li>Cartes de débit</li>
                        <li>Paiement en ligne sécurisé</li>
                    </ul>
                    <p class="mt-2">Tous les paiements sont 100% sécurisés et cryptés.</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <button onclick="toggleFaq(3)" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                    <span class="font-bold text-lg text-gray-900">Puis-je annuler ma réservation ?</span>
                    <svg id="icon-3" class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq-3" class="hidden px-6 pb-5 text-gray-700">
                    <p>Oui, vous pouvez annuler votre réservation selon les conditions suivantes :</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>Plus de 24h avant le départ : Remboursement intégral</li>
                        <li>Entre 12h et 24h avant : Remboursement de 50%</li>
                        <li>Moins de 12h avant : Aucun remboursement</li>
                    </ul>
                    <p class="mt-2">Le remboursement est effectué sous 5-7 jours ouvrables.</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <button onclick="toggleFaq(4)" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                    <span class="font-bold text-lg text-gray-900">Comment obtenir mon billet ?</span>
                    <svg id="icon-4" class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq-4" class="hidden px-6 pb-5 text-gray-700">
                    <p>Après confirmation de votre réservation :</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>Vous recevrez un email de confirmation</li>
                        <li>Téléchargez votre billet PDF depuis votre dashboard</li>
                        <li>Présentez le billet (imprimé ou sur mobile) au chauffeur</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <button onclick="toggleFaq(5)" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                    <span class="font-bold text-lg text-gray-900">Que faire si je rate mon bus ?</span>
                    <svg id="icon-5" class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq-5" class="hidden px-6 pb-5 text-gray-700">
                    <p>Si vous ratez votre bus :</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>Contactez immédiatement notre service client</li>
                        <li>Nous essaierons de vous placer sur le prochain bus disponible</li>
                        <li>Des frais de modification peuvent s'appliquer</li>
                    </ul>
                    <p class="mt-2 font-semibold">Conseil : Arrivez 15 minutes avant le départ.</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <button onclick="toggleFaq(6)" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                    <span class="font-bold text-lg text-gray-900">Les bagages sont-ils inclus ?</span>
                    <svg id="icon-6" class="w-6 h-6 text-orange-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq-6" class="hidden px-6 pb-5 text-gray-700">
                    <p>Oui, chaque passager a droit à :</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>1 bagage en soute (max 20kg)</li>
                        <li>1 bagage à main</li>
                    </ul>
                    <p class="mt-2">Les bagages supplémentaires peuvent être facturés.</p>
                </div>
            </div>

        </div>

        <div class="mt-12 bg-orange-50 rounded-xl p-8 text-center">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Vous ne trouvez pas votre réponse ?</h3>
            <p class="text-gray-700 mb-6">Notre équipe est là pour vous aider</p>
            <a href="{{ route('contact') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-orange-600 transition">
                Contactez-nous
            </a>
        </div>

    </div>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 SATAS Bus. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        function toggleFaq(id) {
            const content = document.getElementById('faq-' + id);
            const icon = document.getElementById('icon-' + id);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>

</body>
</html>
