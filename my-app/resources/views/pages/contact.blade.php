<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - SATAS Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    @include('partials.navbar')

    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Contactez-nous</h1>
            <p class="text-xl opacity-90">Nous sommes là pour répondre à toutes vos questions</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-16">
        
        <div class="grid md:grid-cols-2 gap-12">
            
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nom complet</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Sujet</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Message</label>
                        <textarea name="message" rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-orange-500 text-white font-bold py-3 rounded-lg hover:bg-orange-600 transition">
                        Envoyer le message
                    </button>
                </form>
            </div>

            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Informations de contact</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="text-3xl">📍</div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Adresse</h3>
                            <p class="text-gray-600">123 Avenue Mohammed V<br>Casablanca, Maroc</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="text-3xl">📞</div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Téléphone</h3>
                            <p class="text-gray-600">+212 5 22 XX XX XX<br>+212 6 XX XX XX XX</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="text-3xl">✉️</div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600">contact@satasbus.ma<br>support@satasbus.ma</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="text-3xl">🕐</div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Horaires</h3>
                            <p class="text-gray-600">Lundi - Vendredi: 8h00 - 18h00<br>Samedi: 9h00 - 13h00<br>Dimanche: Fermé</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-orange-50 rounded-lg p-6">
                    <h3 class="font-bold text-gray-800 mb-3">Service Client 24/7</h3>
                    <p class="text-gray-600 mb-4">Pour toute urgence ou assistance immédiate, notre service client est disponible 24h/24 et 7j/7.</p>
                    <p class="text-2xl font-bold text-orange-600">📱 +212 800 SATAS</p>
                </div>
            </div>

        </div>

    </div>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 SATAS Bus. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
