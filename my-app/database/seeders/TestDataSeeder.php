<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Programme;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $programmes = Programme::with('route.segments')->limit(5)->get();

        foreach ($programmes as $programme) {
            if ($programme->route->segments->isNotEmpty()) {
                Reservation::create([
                    'user_id' => $user->id,
                    'programme_id' => $programme->id,
                    'nombre_places' => rand(1, 3),
                    'date_reservation' => now()->subDays(rand(1, 30)),
                    'status' => 'payé',
                ]);
            }
        }
    }
}
