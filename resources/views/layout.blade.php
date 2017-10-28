<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .active{
            text-decoration:none;
            color:green;
        }
        .error{
            color:red;
            font-size:12px;
        }
    </style>
    <title>Mi sitio</title>
</head>
<body>

    {{--
        Para ponerle estilo a las direcciones si son la misma ruta que se les esta pasando en donde estan
        <h1>{{ request()->url() }}</h1>
        <h1>{{ request()->is('/') ? 'Estas en el home':'No estas en el home' }}</h1> pregunta si la url donde estamos es la misma que pasamos por parametro
    --}}

    <header>
        <nav>
            <a href="{{ route('home') }}">Inicio</a>
            {{-- <a class="{{ request->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a> --}}
            <a href="{{ route('saludo','javier') }}">Saludo</a>
            <a href="{{ route('mensajes.create') }}">Contacto</a>
            <a href="{{ route('mensajes.index') }}">Mensajes</a>

            @if(auth()->guest())
            {{--devuelve un boolean de v o f,si es un usuario invitado le monstramos login--}}
                <a href="/login">login</a>
            @endif

            @if(auth()->check())
            {{--si existe un usuario authenticado actualmente--}}
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        </nav>
    </header>

    @yield('contenido')

    <footer>Copyright - {{date("Y")}}</footer>

</body>
</html>