@extends('layout')

@section('contenido')

    <h1>Editar usuario</h1>

    <form method="POST" action={{ route('usuarios.update',$user->id) }}>
    {!! method_field('PUT') !!}
    {{--<input type="hidden" name="_token" value="{{ crfs_token}}">--}}
    {{--para pasar el middleware se le agrega _token, hace una comparacion de token si son lo mismo da paso --}}
    
    
    
    @include('users.form')
    
    </form>

@stop