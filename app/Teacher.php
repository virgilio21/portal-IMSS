<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $guarded = [];

    public function matters(){
        return $this->hasMany(Matter::class);
    }


}
