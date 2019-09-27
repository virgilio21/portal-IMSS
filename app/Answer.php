<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Answer extends Model
{
    //
    protected $guarded = [];

    public function question(){

        return $this->belongsTo(Question::class);
    }

    public function users(){

        return $this->belongsToMany(User::class);
    }
}
