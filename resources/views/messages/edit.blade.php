@extends('layout')

@section('contenido')

    <h1>Editar mensaje</h1>

    <form method="POST" action={{ route('messages.update',$message->id) }}>
    {!! method_field('PUT') !!}
    {{--<input type="hidden" name="_token" value="{{ crfs_token}}">--}}
    {{--para pasar el middleware se le agrega _token, hace una comparacion de token si son lo mismo da paso --}}
    
    {!! csrf_field() !!} {{--reemplaza el input _token--}}
    
    <p><label for="nombre">Nombre
        <input type="text" name="nombre" value="{{ $message->nombre }}">
        {!! $errors->first('nombre','<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="email">email
        <input type="email" name="email"  value="{{ $message->email }}">
        {!! $errors->first('email','<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="mensaje">Mensaje
        <textarea name="mensaje"> {{ $message->mensaje }} </textarea>
        {!! $errors->first('mensaje','<span class=error>:message</span>') !!}
    </label></p>

        <input type="submit" value="Editar">
        </form>

@stop