<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

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

        //class 31 optimizar consultas
        $users = User::with(['roles','note','tags'])->get();

        //$users = \App\User::All();
        return view('users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $roles = Role::pluck('display_name','id');
        return view('users.create', compact('roles','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|confirmed',
            'roles' => 'required',
            'avatar' => 'required|image',
        ]);

        $user = (new User)->fill($request->all());
        //user = User::create($request->all());

        //if($request->hasFile('avatar')){
            $user->avatar = $request->file('avatar')->store('public');
        //}
        $user->save();
        $user->roles()->attach($request->roles);
        return redirect()->route('usuarios.index');

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

        $roles = Role::pluck('display_name','id');

        return view('users.edit', compact('user', 'roles'));
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
        //dd($request->file('avatar'));

        $this->validate($request,[
            'name' => 'required|min:3|max:60|regex:/^[óáéíúña-z-\s]+$/i',
            'email' => 'required|max:60|email|unique:users,id,'.$request->route('usuario'),
            'avatar' => 'image',
        ]);
        
        $user = User::findOrFail($id);
        
        $this->authorize('update',$user);

        if($request->hasFile('avatar')){
            $user->avatar = $request->file('avatar')->store('public');
        }

        //$user->update($request->all());
        $user->update($request->only('name','email'));
        
        //agrega los nuevos roles y si ya esta agregado los duplica
        //$user->roles()->attach($request->roles);

        //mantiene sincronizados los roles sin duplicaciones
        $user->roles()->sync($request->roles);

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
