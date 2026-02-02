<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gare;

class GareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gare::create([
            'ville_id' => 1,
            'nom' => 'Gare Voyageurs',
            'adresse' => 'Center City, Casa'
        ]);
        Gare::create([
            'ville_id' => 1,
            'nom' => 'Gare Oasis',
            'adresse' => 'Oasis District, Casa'
        ]);

        Gare::create([
            'ville_id' => 2,
            'nom' => 'Gare Agdal',
            'adresse' => 'Agdal, Rabat'
        ]);
        Gare::create([
            'ville_id' => 2,
            'nom' => 'Gare Ville',
            'adresse' => 'Downtown, Rabat'
        ]);
    }
}
