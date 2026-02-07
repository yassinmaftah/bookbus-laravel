<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
    // public function segments()
    // {
    //     return $this->hasMany(Segment::class);
    // }
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
