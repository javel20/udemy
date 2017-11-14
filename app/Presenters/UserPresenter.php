<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;
use App\User;

class UserPresenter{

    protected $user;

    public function __construct(User $user){

        $this->user = $user;

    }

    public function link(){

        return new HtmlString("<a href='" . route('usuarios.show', $this->user->id) . "'>{$this->user->name}</a>");

    }

    public function roles(){

        return $this->user->roles->pluck('display_name')->implode(' - ');

    }
/*
    public function notes(){
        
        return optional($this->user)->notes->pluck('body')->implode(' - ');
        
    }

    public function tags(){
        
        return $this->user->tags->pluck('name')->implode(' - ');
        
    }
*/

}