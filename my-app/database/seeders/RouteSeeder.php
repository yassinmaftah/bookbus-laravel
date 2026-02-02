<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Route::create([
            'nom' => 'Casablanca - Rabat Express',
            'description' => 'Direct highway route connecting economic and administrative capitals.'
        ]);

        Route::create([
            'nom' => 'Marrakesh - Agadir Scenic',
            'description' => 'Tourist route through the mountains.'
        ]);
    }
}
