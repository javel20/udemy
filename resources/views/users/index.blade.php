@extends('layout')
@section('contenido')

    <h1>Usuarios</h1>
    <a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">Crear nuevo usuario</a>
    <table class="table">
    
        <thead>
        
            <tr>
            
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Notas</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            
            </tr>

        </thead>

        <tbody>
        
            @foreach($users as $user)

                <tr>

                    <td>
                    {{--class 44: views present
                    {{ $user->present()->link() }}
                    --}}

                        <a href="{{ route('usuarios.show',$user->id) }}">
                            {{ $user->name }}
                        </a>                        
                    </td>
                    <td>{{ $user->email }}</td>
                    {{--con collective, implode es un separador--}}
                    <td>
                        {{--class 44: views present
                        {!! $user->present()->roles() !!} 
                        --}}
                        {{ $user->roles->pluck('display_name')->implode(' - ') }}
                    </td>

                    {{--sin collective
                    <td>
                        @foreach($user->roles as $role)
                            {{ $role->display_name.',' }}
                        @endforeach
                    </td>
                    --}}

                    {{--sale error con {{ $message->note->body }} se le añade optional para evitarlo--}}
                    <td>
                    {{--class 44: views present
                        {!! $user->present()->notes() !!} 
                        --}}
                    {{ optional($user->note)->body }}</td>
                    <td>
                    {{--class 44: views present
                        {!!  $user->present()->tags() !!} 
                        --}}
                    {{ optional($user->tags)->pluck('name')->implode(', ') }}</td>

                    <td>
                        <a class="btn btn-info btn-xs" href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
                        @include('users.delete')
                    </td>
                    
                </tr>

            @endforeach
        
        </tbody>

    </table>

@stop