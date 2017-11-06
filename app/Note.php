<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = ['body'];


    //para las relaciones polimorficas uno a uno
    public function notable(){
        
        return $this->morphTo();
        
    }

    /*
    //uno a uno
    public function message(){
        
        return $this->belongsTo(Message::class);
        
    }
    */
}
