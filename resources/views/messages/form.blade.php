

@unless(isset($message) and $message->user_id)
{{--
isset, si la variable $message esta definida
unless a menos que mensaje tenga un id--}}

        <p><label for="nombre">Nombre
            <input class="form-control" type="text" name="nombre" value="{{ isset($message->nombre) ? $message->nombre : old('nombre') }}">
            {!! $errors->first('nombre','<span class=error>:message</span>') !!}
        </label></p>

        <p><label for="email">Email
            <input class="form-control" type="email" name="email"  value="{{ isset($message->email) ? $message->email : old('email') }}">
            {!! $errors->first('email','<span class=error>:message</span>') !!}
        </label></p>
    @endunless
    
    <p><label for="mensaje">Mensaje
        <textarea class="form-control" name="mensaje">{{ isset($message->mensaje) ? $message->mensaje : old('mensaje') }}</textarea>
        {!! $errors->first('mensaje','<span class=error>:message</span>') !!}
    </label></p>

        <input class="btn btn-primary" type="submit" value="{{ isset($btnText) ? $btnText : 'Guardar' }}">
