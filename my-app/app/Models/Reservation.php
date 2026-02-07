<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id','programme_id','nombre_places','date_reservation','status'];
    public function user(){return $this->belongsTo(User::class);}
    public function programme(){return $this->belongsTo(Programme::class);}
}
