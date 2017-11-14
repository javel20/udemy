<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Messages;
use DB;
use Mail;
use Carbon\Carbon;
use App\Events\MessageWasReceived;
use Illuminate\Support\Facades\Cache;

use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // si queremos utilizar decorador cambiamos la clase Messages a CacheMessages

     protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
        $this->middleware('auth', ['except' => ['create','store']]);
    }


    public function index()
    {

        //como ya traigo el el constructor el App\repositories\messages
        //lo utilizo mediante $this->messages
        $messages = $this->messages->getIndex();

        return view('messages.index', compact('messages'));

        

        /*
        //class 40.1
        //cuando estemos en la pagina uno estara en messages.page.1 sucesivamente
        $key = "messages.page" . request('page',1);
        if(Cache::has($key)){

            $messages = Cache::get($key);

        }else{
        
        //class 31 optimizar consultas
        $messages = Message::with(['user','note','tags'])->paginate(10);
        
        //$messages = DB::table('messages')->get();
        
        //class 40
        //$message laravel lo convierte a json para guardarlo en la cache
        Cache::put($key, $messages, 5);

        }*/

        //class 17
        //$messages = Message::all();
        return view('messages.index')->with([
            'messages' => $messages
        ]);
        //return view('messages.index', compact('message));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$message = new Message;
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*DB::table('messages')->insert([
            "nombre" => $request->nombre,
            "email" => $request->email,
            "mensaje" => $request->mensaje,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);*/

        //class 17
        /*(1)$message = New Message;
        $message->nombre = $request->nombre;
        $message->email = $request->email;
        $message->mensaje = $request->mensaje;
        $message->save();
        */
        
            
        //class 4: repositorios los datos vienen de App\repositories\Message
        $message = $this->messages->store($request);

        //class34:eventos, el nombre es en pasado: su mensaje a sido recibido
        event(new MessageWasReceived($message));

        //el codigo del email se paso al listener

        return redirect()->route('mensajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //class 40:cache
        $message = $this->messages->show($id);
        

        //$message = DB::table('messages')->where('id',$id)->first();
        //$message = Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        //class 40:cache
        $message = $this->messages->show($id);
        

        //$message = DB::table('messages')->where('id', $id)->first();
        //$message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*DB::table('messages')->where('id',$id)->update([

            "nombre" => $request->nombre,
            "email" => $request->email,
            "mensaje" => $request->mensaje,
            "updated_at" => Carbon::now(),

        ]);*/


        $message = $this->messages->update($request, $id);

        
        //dd($request->all());
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return "eliminar";
        //DB::table('messages')->where('id',$id)->delete();
        $this->messages->destroy($id);
        return redirect()->route('mensajes.index');
    }
}
