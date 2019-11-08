<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $guarded = [];

    

    public function sections(){

       
        return $this->hasMany(Section::class)->orderBy('created_at', 'desc');
        
    }

    public function users(){

        return $this->belongsToMany(User::class)->withPivot('status');
    }
}
