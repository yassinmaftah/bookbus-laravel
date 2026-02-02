<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Segment;
class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Segment::create([
            'etape_depart_id' => 1,
            'etape_arrivee_id' => 2,
            'tarif' => 45.00,
            'duree_estimee' => 60,
            'distance_km' => 87.0
        ]);
    }
}
