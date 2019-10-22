<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
    	return $this->belongsTo('\App\User');
    }
    public function car(){
    	return $this->belongsTo('\App\Car');
    }
    public function privatecar(){
    	return $this->belongsTo('\App\PrivateCar');
    }
}