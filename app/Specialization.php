<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;

class Specialization extends Model
{
    //
    public function doctors(){

        return $this->hasMany('App\Doctor','specialization_id');
    }
}
