<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    //uno a uno user role
    public function user(){

        return $this->hasOne(User::class);

    }
}
