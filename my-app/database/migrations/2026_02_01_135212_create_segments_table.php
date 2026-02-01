<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('segments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etape_depart_id')->constrained('etapes')->onDelete('cascade');
            $table->foreignId('etape_arrivee_id')->constrained('etapes')->onDelete('cascade');
            $table->decimal('tarif', 8, 2);
            $table->integer('duree_estimee');
            $table->float('distance_km')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('segments');
    }
};
