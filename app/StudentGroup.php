<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    //
    protected $guarded = [];
    protected $table ="matter_user_user";
    //protected $table ="group_user";


    public function grupo(){
        return $this->belongsTo(Group::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

      //uno a muchos
      public function units(){
        return $this->hasMany(Unit::class);
    }




}
