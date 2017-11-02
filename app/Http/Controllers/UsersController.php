<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        
                //$this->middleware('example');
                $this->middleware('auth', ['except'=>['show']]);
                $this->middleware('roles:admin', ['except' => ['edit','update','show']]);
                //$this->middleware('example')->except('home');
        
    }


    public function index()
    {

        $users = \App\User::All();
        return view('users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:60|regex:/^[óáéíúña-z-\s]+$/i',
            'password' => 'required',
            'email' => 'required|max:60|email|unique:users,email,',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = DB::table('users')->where('id',$id)->first();
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::findOrFail($id);

        $this->authorize('edit',$user);

        return view('users.edit', compact('user'));
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
        $this->validate($request,[
            'name' => 'required|min:3|max:60|regex:/^[óáéíúña-z-\s]+$/i',
            'email' => 'required|max:60|email|unique:users,id,'.$request->route('usuarios'),
        ]);
        
        $user = User::findOrFail($id);

        $this->authorize('update',$user);
        
        $user->update($request->all());
        
        //dd($request->all());

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('destroy',$user);

        $user->delete();

        return redirect()->route('usuarios.index');
    }
}
