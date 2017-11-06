<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];


    //relacion polimorfica de muchos a muchos
    public function messages(){

        return $this->morphedByMany(Message::class, 'taggable');

    }

    public function users(){
        
        return $this->morphedByMany(User::class, 'taggable');
        
    }
}
