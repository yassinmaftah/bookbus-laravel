<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function etapeDepart()
    {
        return $this->belongsTo(Etape::class, 'etape_depart_id');
    }

    public function etapeArrivee()
    {
        return $this->belongsTo(Etape::class, 'etape_arrivee_id');
    }
}

