<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $guarded = [];
    protected $table ="matter_user";

    public function matter(){
        return $this->belongsTo(Matter::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this-> belongsToMany(User::class)->withTimestamps();
    }

    public function grupoAlumno(){
        return $this->hasMany(StudentGroup::class);
    }


}
