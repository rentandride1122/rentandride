<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class Car extends Model implements Authenticatable
{
    protected $guarded =[];
    use AuthenticableTrait;

    public function book(){
    	return $this->belongsTo('\App\Booking');
    }

}
