<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gare;
use App\Models\Ville;

class GareSeeder extends Seeder
{
    public function run(): void
    {
        $casaId = Ville::where('name', 'Casablanca')->first()->id;
        $rabatId = Ville::where('name', 'Marrakech')->first()->id; // Ou Rabat si tu l'ajoutes
        $tangerId = Ville::where('name', 'Tangier ')->first()->id; // Attention à l'espace dans ton array 'Tangier '

        Gare::create([
            'ville_id' => $casaId,
            'nom' => 'Gare Voyageurs',
            'adresse' => 'Centre Ville'
        ]);

        Gare::create([
            'ville_id' => $tangerId,
            'nom' => 'Gare Tanger Ville',
            'adresse' => 'Corniche'
        ]);

    }
}
