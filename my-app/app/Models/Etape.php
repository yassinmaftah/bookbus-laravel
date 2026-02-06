<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    public function gare()
    {
        return $this->belongsTo(Gare::class);
    }
}
