<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable =  ['nombre','email','mensaje','user_id'];
    

    //relacion polimorfica
    public function note(){
        
        return $this->morphOne(Note::class,'notable');
        
    }

    /*
    public function note(){
        
        return $this->hasOne(Note::class);
        
    }*/

    //el mensaje pertenece a un usuario
    public function user(){
        
        return $this->belongsTo(User::class);
        
    }
    
}