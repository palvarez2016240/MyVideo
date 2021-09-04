<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script> src="{{ asset('js/app.js') }}" defer></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://iconape.com/wp-content/png_logo_vector/google-display-and-video-ads.png">
</head>
<body>

    @yield('css')

    <!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
    <div class="container-xl">
      <!-- Logo -->
      <a class="navbar-brand" href="/">
        MyVideo Tv
      </a>
      <!-- Navbar toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Nav -->
      <div class="navbar-nav mx-lg-auto">
        <a class="nav-item nav-link" aria-current="page" href="{{route('creators.index')}}">Creadores</a>
        <a class="nav-item nav-link" aria-current="page" href="{{route('categorias.index')}}">Categorias</a>
      </div>
      <!-- Collapse -->
      <div class="opciones collapse navbar-collapse" id="navbarCollapse">
      </div>
    </div>
</nav>


    @yield('breadcrumbs')

    @yield('content')


    @yield('js')

    @yield('jquery')
</body>

<br> <br>
</html>

