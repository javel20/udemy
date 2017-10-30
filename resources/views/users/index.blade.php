@extends('layout')
@section('contenido')

    <h1>Todos los usuarios</h1>
    <table class="table">
    
        <thead>
        
            <tr>
            
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            
            </tr>

        </thead>

        <tbody>
        
            @foreach($users as $user)

                <tr>

                    <td>
                        <a href="{{ route('mensajes.show',$user->id) }}">
                            {{ $user->name }}
                        </a>                        
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>

                    <td>

                    
                    </td>
                </tr>

            @endforeach
        
        </tbody>

    </table>

@stop