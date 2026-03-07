<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programme;
use App\Models\Route;
use App\Models\Bus;
use Carbon\Carbon;

class AdditionalProgrammeSeeder extends Seeder
{
    public function run(): void
    {
        $routes = Route::all();
        $buses = Bus::all();

        if ($routes->isEmpty() || $buses->isEmpty()) {
            $this->command->warn('No routes or buses found. Run RouteSeeder and BusSeeder first.');
            return;
        }

        for ($day = 0; $day < 30; $day++) {
            $date = Carbon::today()->addDays($day);
            
            foreach ($routes->random(min(10, $routes->count())) as $route) {
                $heuresDepart = ['06:00', '08:30', '11:00', '14:00', '16:30', '19:00', '21:30'];
                
                foreach (array_rand(array_flip($heuresDepart), rand(2, 4)) as $heureDepart) {
                    $heureArrivee = Carbon::parse($heureDepart)->addHours(rand(2, 6))->format('H:i');
                    
                    Programme::create([
                        'route_id' => $route->id,
                        'bus_id' => $buses->random()->id,
                        'jour_depart' => $date->format('Y-m-d'),
                        'heure_depart' => $heureDepart,
                        'heure_arrivee' => $heureArrivee,
                    ]);
                }
            }
        }
    }
}
