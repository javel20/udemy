@extends('layout')
@section('contenido')

    <h1>Todos los mensajes</h1>
    <table>
    
        <thead>
        
            <tr>
            
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            
            </tr>

        </thead>

        <tbody>
        
            @foreach($messages as $message)

                <tr>

                    <td>
                        <a href="{{ route('mensajes.show',$message->id) }}">
                            {{ $message->nombre }}
                        </a>                        
                    </td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->mensaje }}</td>

                    <td>
                        <a href="{{ route('mensajes.edit', $message->id) }}">Editar</a>
                        @include('messages.delete')
                    
                    </td>
                </tr>

            @endforeach
        
        </tbody>

    </table>

@stop