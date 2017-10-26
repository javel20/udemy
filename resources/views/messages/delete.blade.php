<form method="DELETE" action="{{ route('messages.destroy',$message->id)}}">

    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}

    <button type="submit">Eliminar</button>

</form>