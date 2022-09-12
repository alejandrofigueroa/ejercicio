<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ELA</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons.css') }}" rel="stylesheet" >
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" >
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerLayout" aria-controls="navbarTogglerLayout" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerLayout">
            <a class="navbar-brand" href="{{ url('/') }}">ELA</a> 
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only"></span></a>
                    </li>
                    <li >
                        <a class="nav-link" href="{{ route('cooperantes.index') }}">Cooperantes <span class="sr-only"></span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('proyectos.index') }}">Proyectos <span class="sr-only"></span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('asignaciones.index') }}">Asignaciones <span class="sr-only"></span></a>
                    </li>
                </ul>
    </nav> 

    
    @yield('content')
    
    
</body>
</html>
