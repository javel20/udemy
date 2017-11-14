<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;
use App\Message;

class MessagePresenter{

    protected $message;

    public function __construct(Message $message){

        $this->message = $message;

    }

    public function userName(){

        if($this->message->user_id){
            return $this->message->user->name;
        }
        return $this->message->nombre;

    }

    public function userEmail(){
        
        if($this->message->user_id){
            return $this->message->user->email;
        }
        return $this->message->email;
        
    }

    public function link(){

        return new HtmlString("<a href='" . route('mensajes.show', $this->message->id) . "'>{$this->message->mensaje}</a>");

    }

}