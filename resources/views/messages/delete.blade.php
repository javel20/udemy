<form style="display:inline" method="POST" action="{{ route('mensajes.destroy',$message->id)}}">

    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}

    <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>

</form>