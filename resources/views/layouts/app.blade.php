<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>Laravel demo</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">Laravel demo</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarToggle">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link" href="{{ route('home') }}">Home</a>
              <a class="nav-item nav-link" href="{{ route('about') }}">About</a>
            </div>

          </div>
        </div>
      </nav>
    </header>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-10">
            
            @yield('content')
            
        </div>
        <div class="col-md-2">
          <div class="list-group">
            @auth
              <a class="list-group-item list-group-item-action" href="{{ route('posts.create') }}">New Post</a>
              <a class="list-group-item list-group-item-action" href="#">Profile</a>
              
              <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            @else
              <a class="list-group-item list-group-item-action" href="{{ route('login') }}">Login</a>
              <a class="list-group-item list-group-item-action" href="{{ route('register') }}">Register</a>
            @endauth
          </div>
        </div>
      </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script> 
  </body>
</html>