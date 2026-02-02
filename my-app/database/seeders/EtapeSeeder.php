<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etape;
class EtapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etape::create([
            'route_id' => 1,
            'gare_id' => 1,
            'ordre' => 1,
            'heure_passage' => '08:00:00'
        ]);

        // 2. Arrive: Rabat Agdal
        Etape::create([
            'route_id' => 1,
            'gare_id' => 3,
            'ordre' => 2,
            'heure_passage' => '09:30:00'
        ]);
    }
}
