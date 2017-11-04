@extends('layout')
@section('contenido')

    <h1>Todos los mensajes</h1>
    <table class="table">
    
        <thead>
        
            <tr>
            
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Notas</th>
                <th>Acciones</th>
            
            </tr>

        </thead>

        <tbody>
        
            @foreach($messages as $message)

                <tr>
                    @if($message->user_id)
                        <td>
                            <a href="{{ route('usuarios.show',$message->user_id) }}">
                                {{ $message->user->name }}</td>
                            </a>
                        <td>{{ $message->user->email }}</td>
                    @else
                    <td>{{ $message->nombre }}</td>
                    <td>{{ $message->email }}</td>
                    @endif

                    <td>
                        <a href="{{ route('mensajes.show',$message->id) }}">
                            {{ $message->mensaje }}
                        </a>
                    </td>
                        {{--sale error con {{ $message->note->body }} se le añade optional para evitarlo--}}
                        <td>{{ optional( $message->note )->body }}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{ route('mensajes.edit', $message->id) }}">Editar</a>
                        @include('messages.delete')
                    
                    </td>
                </tr>

            @endforeach
        
        </tbody>

    </table>

@stop