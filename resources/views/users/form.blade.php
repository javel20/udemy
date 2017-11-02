
{!! csrf_field() !!} {{--reemplaza el input _token--}}

    <p><label for="nombre">Nombre
        <input class="form-control" type="text" name="name" value="{{ isset($user->name) ? $user->name : old('name') }}">
        {!! $errors->first('name','<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="email">email
        <input class="form-control" type="email" name="email"  value="{{ isset($user->email) ? $user->email : old('email') }}">
        {!! $errors->first('email','<span class=error>:message</span>') !!}
    </label></p>

@unless($user->id)
    <p><label for="password">Password
        <input class="form-control" type="password" name="password">
        {!! $errors->first('password','<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="password_confirmation">Password Confirm
        <input class="form-control" type="password" name="password_confirmation">
        {!! $errors->first('password_confirmation','<span class=error>:message</span>') !!}
    </label></p>
@endunless

    <div class="checkbox">
    
        @foreach($roles as $id => $name)
            <label for="">
                <input type="checkbox" value="{{ $id }}" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : ''}} name="roles[]">
                {{ $name }}
            </label>
        @endforeach
        {!! $errors->first('roles','<span class=error>:message</span>') !!}
    </div>

    <input class="btn btn-primary" type="submit" value="Editar">