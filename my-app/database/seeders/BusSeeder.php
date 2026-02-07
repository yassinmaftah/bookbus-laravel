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
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            Bus::create([
                'matricule' => rand(1000, 99999) . '-A-' . rand(1, 80),
                'capacite' => 50,
            ]);
        }
    }
}
