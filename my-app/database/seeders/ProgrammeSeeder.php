<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programme;
use Carbon\Carbon;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Programme::create([
            'bus_id' => 1,
            'route_id' => 1,
            'jour_depart' => Carbon::today(), // Dynamic date "Today"
            'heure_depart' => '08:00:00',
            'heure_arrivee' => '09:00:00',
            'is_active' => true
        ]);

        // Trip 2: Leaving TOMORROW
        Programme::create([
            'bus_id' => 2,
            'route_id' => 1,
            'jour_depart' => Carbon::tomorrow(), // Dynamic date "Tomorrow"
            'heure_depart' => '10:00:00',
            'heure_arrivee' => '11:00:00',
            'is_active' => true
        ]);
    }
}
