<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

<<<<<<< HEAD

class Car extends Model
{
    protected $guarded =[];



=======
class Car extends Model implements Authenticatable
{
    protected $guarded =[];
    use AuthenticableTrait;
>>>>>>> master
}
