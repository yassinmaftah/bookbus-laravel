<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Ville;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ville::create(['name' => 'Fes']);
        Ville::create(['name' => 'Meknes']);
        Ville::create(['name' => 'Oujda']);
        Ville::create(['name' => 'Kenitra']);
        Ville::create(['name' => 'Tetouan']);
    }
}
