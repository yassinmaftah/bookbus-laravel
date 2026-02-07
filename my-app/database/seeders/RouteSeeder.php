<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gare;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Etape;
use App\Models\Segment;
use App\Models\Programme;
use Carbon\Carbon;

class RouteSeeder extends Seeder
{
    public function run()
    {
        $gares = Gare::all();
        $buses = Bus::all();

        if($gares->count() < 2 || $buses->count() == 0) return;

        foreach ($gares as $depart) {
            foreach ($gares as $arrivee) {

                if ($depart->id === $arrivee->id) continue;

                $route = Route::create([
                    'nom' => $depart->ville->name . ' - ' . $arrivee->ville->name
                ]);

                $etape1 = Etape::create([
                    'route_id' => $route->id,
                    'gare_id' => $depart->id,
                    'ordre' => 1
                ]);

                $etape2 = Etape::create([
                    'route_id' => $route->id,
                    'gare_id' => $arrivee->id,
                    'ordre' => 2
                ]);

                $segment = Segment::create([
                    'etape_depart_id' => $etape1->id,
                    'etape_arrivee_id' => $etape2->id,
                    'distance_km' => rand(50, 800),
                    'tarif' => rand(30, 300),
                    'duree_estimee' => rand(60, 720)
                ]);

                for ($day = 0; $day < 7; $day++) {
                    $date = Carbon::today()->addDays($day);

                    foreach ([8, 12, 16, 20] as $hour) {
                        $departTime = Carbon::createFromTime($hour, rand(0, 59), 0);
                        Programme::create([
                            'route_id' => $route->id,
                            'bus_id' => $buses->random()->id,
                            'jour_depart' => $date,
                            'heure_depart' => $departTime->format('H:i:s'),
                            'heure_arrivee' => $departTime->copy()->addMinutes($segment->duree_estimee)->format('H:i:s')
                        ]);
                    }
                }
            }
        }
    }
}
