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
                        <a href="{{ route('usuarios.show',$user->id) }}">
                            {{ $user->name }}
                        </a>                        
                    </td>
                    <td>{{ $user->email }}</td>
                    {{--con collective, implode es un separador--}}
                    <td>
                        {{ $user->roles->pluck('display_name')->implode(' - ') }}
                    </td>

                    {{--sin collective
                    <td>
                        @foreach($user->roles as $role)
                            {{ $role->display_name.',' }}
                        @endforeach
                    </td>
                    --}}

                    <td>
                        <a class="btn btn-info btn-xs" href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
                        @include('users.delete')
                    </td>
                    
                </tr>

            @endforeach
        
        </tbody>

    </table>

@stop