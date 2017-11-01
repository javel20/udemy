@extends('layout')

@section('contenido')

    <h1>Editar usuario</h1>

    <form method="POST" action={{ route('usuarios.update',$user->id) }}>
    {!! method_field('PUT') !!}
    {{--<input type="hidden" name="_token" value="{{ crfs_token}}">--}}
    {{--para pasar el middleware se le agrega _token, hace una comparacion de token si son lo mismo da paso --}}
    
    {!! csrf_field() !!} {{--reemplaza el input _token--}}
    
    <p><label for="nombre">Nombre
        <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        {!! $errors->first('name','<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="email">email
        <input class="form-control" type="email" name="email"  value="{{ $user->email }}">
        {!! $errors->first('email','<span class=error>:message</span>') !!}
    </label></p>


        <input class="btn btn-primary" type="submit" value="Editar">
        </form>

@stop