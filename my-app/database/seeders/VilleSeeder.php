<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Ville;
use App\Models\Gare;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $villes = [
            'Casablanca', 'Rabat', 'Marrakech', 'Tanger', 'Agadir',
            'Fès', 'Meknès', 'Oujda', 'Tétouan', 'Essaouira',
            'El Jadida', 'Safi', 'Kenitra', 'Béni Mellal', 'Nador',
            'Khouribga', 'Settat', 'Larache', 'Khénifra', 'Guelmim'
        ];

        foreach ($villes as $nomVille) {
            $ville = Ville::firstOrCreate(['name' => $nomVille]);

            Gare::firstOrCreate([
                'nom' => 'Gare Routière ' . $nomVille,
                'ville_id' => $ville->id
            ]);
        }
    }
}
