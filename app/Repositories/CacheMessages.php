<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class CacheMessages implements MessagesInterface{

    protected $messages;


    public function __construct(Messages $messages){

        $this->messages = $messages;

    }


    public function getIndex(){

        $key = "messages.page" . request('page',1);
        
        //para redis
        //$messages = Cache::tags('messages')->remember($key, 5, function(){

        //remember = si la llave existe devuelve el valor $messages, si no existe almacena lo que devuelve la function
        //$messages = Cache::remember($key, 5, function(){

        //sin tiempo limite
        return Cache::rememberForever($key, function(){
            return $this->messages->getIndex();
        });

    }

    public function store(){

        $message = $this->messages->store($request);
        Cache::flush();
        return $message;

    }

    public function show($id){

        return Cache::remember("messages.{id}",5,function() use($id){
            return $this->messages->show($id);
        });

    }

    public function update($request,$id){

        $message = $this->messages->update($request, $id);
        Cache::flush();
        return $message;

    }

    public function destroy($id){

        $message = $this->messages->destroy($id);
        Cache::flush();
        return $message;

    }

}