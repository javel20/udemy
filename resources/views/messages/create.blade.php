@extends('layout')

@section('contenido')

    <h1>contacto</h1>
    <h2>Escríbeme</h2>

    @if( session()->has('info'))
        <h3>{{ session('info') }}</h3>
    @else


    <form method="POST" action={{ route('mensajes.store') }}>
    {{--<input type="hidden" name="_token" value="{{ crfs_token}}">--}}
    {{--para pasar el middleware se le agrega _token, hace una comparacion de token si son lo mismo da paso --}}
    
    {!! csrf_field() !!} {{--reemplaza el input _token--}}

    @include('messages.form')
    
    </form>
    @endif

@stop