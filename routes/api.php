<?php

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialization;

Route::group(['middleware' => 'api'], function(){
    //get all doctors
    Route::get('doctors/{specializations}/{surname}', function( $docname, $specialization){
        return Doctor::with('specialization')
            ->where('specialization_id',	$specialization)
            ->where('surname','like', '%'.$docname.'%')
            ->get();
    });

    Route::get('doctors/{specializations}', function($specialization){
        return Doctor::with('specialization')
            ->where('specialization_id',$specialization)
            ->get();
    });


    //get all specialization
    Route::get('specializations/', function(){
        return Specialization::orderby('name', 'asc')->get();
    });

    //Show individual Doctor
    Route::get('doctor/{id}', function($id){
        return Doctor::findOrFail('id', $id)->first();
    });
    
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
