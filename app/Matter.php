<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $guarded = [];


    //muchos a muchos
    public function users(){
        return $this-> belongsToMany(User::class)->withTimestamps();
    }

    //uno a muchos
    public function groups(){
        return $this->hasMany(Group::class);
    }
}
