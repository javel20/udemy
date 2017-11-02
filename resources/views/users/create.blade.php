@extends('layout')
@section('contenido')
<h1>Crear Usuario</h1>


<form method="POST" action={{ route('usuarios.store') }}>


    @include('users.form')

    <input class="btn btn-primary" type="submit" value="Guardar">

</form>

@stop