@extends('layout')

@section('contenido')

    <h1>Editar mensaje</h1>

    <form method="POST" action={{ route('mensajes.update',$message->id) }}>
    {!! method_field('PUT') !!}
    {{--<input type="hidden" name="_token" value="{{ crfs_token}}">--}}
    {{--para pasar el middleware se le agrega _token, hace una comparacion de token si son lo mismo da paso --}}
    
    {!! csrf_field() !!} {{--reemplaza el input _token--}}
    
    @include('messages.form', ['btnText' => 'Actualizar'])

@stop