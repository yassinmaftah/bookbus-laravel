<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function segments()
    {
        return $this->hasManyThrough(Segment::class,Etape::class,
                                    'route_id','etape_depart_id');
    }
    public function programmes(){return $this->hasMany(Programme::class);}
    public function etapes(){return $this->hasMany(Etape::class);}
}
