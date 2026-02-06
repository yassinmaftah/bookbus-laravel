<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    public function programme()
    {
        return $this->hasMany(Programme::class);
    }
}
