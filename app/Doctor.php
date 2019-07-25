<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specialization;

class Doctor extends Model
{
    //
    protected $table = 'doctors';

    public function specialization(){

        return $this->belongsTo('App\Specialization','specialization_id');
    }
}
