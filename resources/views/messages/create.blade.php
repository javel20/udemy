@extends('layout')

@section('contenido')

    <h1>contacto</h1>
    <h2>Escríbeme</h2>

    @if( session()->has('info'))
        <h3>{{ session('info') }}</h3>
    @else


    <form method="POST" action={{ route('messages.store') }}>
    {{--<input type="hidden" name="_token" value="{{ crfs_token}}">--}}
    {{--para pasar el middleware se le agrega _token, hace una comparacion de token si son lo mismo da paso --}}
    
    {!! csrf_field() !!} {{--reemplaza el input _token--}}
    
    <p><label for="nombre">Nombre
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        {!! $errors->first('nombre','<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="email">email
        <input type="email" name="email"  value="{{ old('email') }}">
        {!! $errors->first('email','<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="mensaje">Mensaje
        <textarea name="mensaje"> {{ old('mensaje') }} </textarea>
        {!! $errors->first('mensaje','<span class=error>:message</span>') !!}
    </label></p>

        <input type="submit" value="Enviar">
        </form>
    @endif

@stop