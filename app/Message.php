<?php

namespace App;

use App\Presenters\MessagePresenter;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable =  ['nombre','email','mensaje','user_id'];
    

    //relacion polimorfica de muchos a muchos
    public function tags(){

        return $this->morphToMany(Tag::class, 'taggable');

    }


    //relacion polimorfica uno a uno
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

    public function present(){
        //$this es el objeto message actual
        return new MessagePresenter($this);
    }
    
}