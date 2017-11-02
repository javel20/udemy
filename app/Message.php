<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable =  ['nombre','email','mensaje','user_id'];
    

    //el mensaje pertenece a un usuario
    public function user(){
        
        return $this->belongsTo(User::class);
        
    }
    
}