
    {{--<input type="hidden" name="_token" value="{{ crfs_token}}">--}}
    {{--para pasar el middleware se le agrega _token, hace una comparacion de token si son lo mismo da paso --}}
    
    {!! csrf_field() !!} {{--reemplaza el input _token--}}


{{--
@unless($message->user_id)
isset, si la variable $message esta definida
unless a menos que mensaje tenga un id --}}
@if($showFields)

        <p><label for="nombre">Nombre
            <input class="form-control" type="text" name="nombre" value="{{ isset($message->nombre) ? $message->nombre : old('nombre') }}">
            {!! $errors->first('nombre','<span class=error>:message</span>') !!}
        </label></p>

        <p><label for="email">Email
            <input class="form-control" type="email" name="email"  value="{{ isset($message->email) ? $message->email : old('email') }}">
            {!! $errors->first('email','<span class=error>:message</span>') !!}
        </label></p>
@endif

{{-- @endunless --}}
    
    <p><label for="mensaje">Mensaje
        <textarea class="form-control" name="mensaje">{{ isset($message->mensaje) ? $message->mensaje : old('mensaje') }}</textarea>
        {!! $errors->first('mensaje','<span class=error>:message</span>') !!}
    </label></p>

        <input class="btn btn-primary" type="submit" value="{{ isset($btnText) ? $btnText : 'Guardar' }}">
