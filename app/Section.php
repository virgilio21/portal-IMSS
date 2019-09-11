<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $guarded = [];


    public function survey(){

        
        return $this->belongsTo(Survey::class);
    }

    public function questions(){
        
        return $this->hasMany(Question::class)->orderBy('created_at', 'desc');
    }
}
