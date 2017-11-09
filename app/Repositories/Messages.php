<?php

namespace App\Repositories;

use App\Message;
use Illuminate\Support\Facades\Cache;

class Messages{

    public function getIndex(){

        //class40 otro metodo de almacenar la cache, si existe en la cache o no

        $key = "messages.page" . request('page',1);
        
        //para redis
        //$messages = Cache::tags('messages')->remember($key, 5, function(){

        //$messages = Cache::remember($key, 5, function(){
        //sin tiempo limite
        return Cache::rememberForever($key, function(){
            return Message::with(['user','note','tags'])
                            ->orderBy('created_at')
                            ->paginate(10);
        });
    }

    public function store($request){
        //class 27 con el user_id
        //(2)(3)(4)save para asignar el usuario a un mensaje que ya a sido guardado
        $message = Message::create($request->all());
        
                
                //(2)para asignarle este usuario a un mensaje que ya a sido ingresado anteriormente
                //enviar usuarios para usuarios autenticas y no autenticados
                if(auth()->check()){
                    auth()->user()->messages()->save($message);
                }
        
                /*
                //solo para usuarios autenticados
                (3)auth()->user()->messages()->create($request->all());
                */
        
                //(4)otro, se le asigna el user_id y se guarda
                //$message->user_id = auth()->id();
                //$message->save();
        
                //cache con redis
                //Cache::tags('messages)->flush();
        
                //class40:cache
                Cache::flush();

                //retorna la variable
                return $message;
    }

    public function show($id){
        return Cache::remember("messages.{id}",5,function() use($id){
            return Message::findOrFail($id);
        });
    }

    public function update($request, $id){

        //para redis
        //Cache::tags('messages')->flush();

        Cache::flush();

        return Message::findOrFail($id)->update($request->all());

    }

    public function destroy($id){

        Cache::flush();
        return Message::findOrFail($id)->delete();

    }

}