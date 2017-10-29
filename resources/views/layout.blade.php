<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">

    <title>Mi sitio</title>

</head>
<body>

    {{--
        Para ponerle estilo a las direcciones si son la misma ruta que se les esta pasando en donde estan
        <h1>{{ request()->url() }}</h1>
        pregunta si la url donde estamos es la misma que pasamos por parametro
        <h1>{{ request()->is('mensajes/create') ? 'Estas en el home':'No estas en el home' }}</h1>
    --}}

    <header>
    <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('home') }}">Inicio</a></li>


        <li><a href="{{ route('saludo','javier') }}">Saludo</a></li>
        <li><a href="{{ route('mensajes.create') }}">Contacto</a></li>
        <li><a href="{{ route('mensajes.index') }}">Mensajes</a></li>

      </ul>
     
      <ul class="nav navbar-nav navbar-right">

        @if(auth()->guest())
            {{--devuelve un boolean de v o f,si es un usuario invitado le monstramos login--}}
                <li><a href="{{ route('login') }}">login</a></li>
            @endif

            @if(auth()->check())
            {{--si existe un usuario authenticado actualmente--}}
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Logout
                </a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


    </header>

    <div class="container">
        @yield('contenido')

        <footer>Copyright - {{date("Y")}}</footer>
    </div>

    <script src="{{ asset('jquery/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>