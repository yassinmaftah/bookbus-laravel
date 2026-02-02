<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bus::create([
            'matricule' => '1234-A-50',
            'capacite' => 50,
            'statut' => 'active'
        ]);

        Bus::create([
            'matricule' => '9876-B-26',
            'capacite' => 60,
            'statut' => 'active'
        ]);

        Bus::create([
            'matricule' => '5555-H-10',
            'capacite' => 45,
            'statut' => 'maintenance'
        ]);
    }
}
