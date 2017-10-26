<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;

class PagesController extends Controller
{
    //construct para pasar middleware
    public function __construct(){

        //$this->middleware('example');
        $this->middleware('example')->only('home');
        //$this->middleware('example')->except('home');

    }


    public function home()
    {
        return view('home');
        
        //class:10 respuestas del servidor
        //return response('Contenido de la respuesta',201)
        //            ->header('X-TOKEN','secret')
        //            ->header('X-TOKEN-2','secret-2')
        //            ->cookie('X-COOKIE','cookie')// este valor se encripta
    }

    public function contacto(){
        return view('contacto');
    }

    public function saludo($nombre=Invitado){
        $consolas=[
            
            "play",
            "Xbox",
            "Wii"
            
        ];
        
        return view('saludo',['nombre'=> $nombre,'consolas'=>$consolas]);
    }

    public function mensajes(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'email' =>'required|email',
            'mensaje' =>'required|min:5',

        ]);
        
        //return $request->all(); //devuelve un array, pero laravel  lo convierte en respuesta json

        //class10:cambiar el status
        //$data = $request->all();//pasamos el contenido en forma de array
        //return response()->json(['data'=> $data],202)
        //                ->header('TOKEN','secret');

        //return redirect('/');
        //dd($request);
        //enviar mensajes por session se utiliza ->with('','')
        //helper redirect, back
        //return redirect()->route('contacto')->with('info','Tu mensaje  ah sido enviado');//mandar mensaje a la vista
        return back()->with('info','Tu mensaje  ah sido enviado');

    }
}
