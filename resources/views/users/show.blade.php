@extends('layout')

@section('contenido')

    <h1>{{ $user->name }}</h1>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
        </tr>

        <tr>
            <th>Roles:</th>
            <td>@foreach($user->roles as $role)
            {{ $role->display_name }}
            @endforeach</td>
        </tr>

    </table>
{{--para que no aparezca el boton para todos se le agrega can
si el usuario puede editar este usuario y le monstramos el boton si es cierto
//solo sean visto por los administradores y los creadores de esa misma cuenta--}}

@can('edit',$user)
    <a href="{{ route('usuarios.edit',$user->id)}}" class="btn btn-info">Editar</a>
@endcan

@can('destroy',$user)
    <a href="{{ route('usuarios.destroy',$user->id)}}" class="btn btn-danger">Eliminar</a>
@endcan

@stop