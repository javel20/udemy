<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('messages')->get();
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
        DB::table('messages')->insert([
            "nombre" => $request->nombre,
            "email" => $request->email,
            "mensaje" => $request->mensaje,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = DB::table('messages')->where('id',$id)->first();
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
        $message = DB::table('messages')->where('id', $id)->first();
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
        DB::table('messages')->where('id',$id)->update([

            "nombre" => $request->nombre,
            "email" => $request->email,
            "mensaje" => $request->mensaje,
            "updated_at" => Carbon::now(),

        ]);
        //dd($request->all());
        return redirect()->route('messages.index');
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
        DB::table('messages')->where('id',$id)->delete();
        return redirect()->route('messages.index');
    }
}