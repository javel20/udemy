<form method="POST" action="{{ route('mensajes.destroy',$message->id)}}">

    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}

    <button type="submit">Eliminar</button>

</form>