<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>
        
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
        
    </head>

    <body>
      
      
        <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li></li>
          <ul class="navbar-nav">
              <li></li>
          </ul>
        </ul>
        <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#"><router-link to="/">Home</router-link></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><router-link to="/sample">Sample</router-link></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><router-link to="/example">Example</router-link></a>
      </li>
      
    </ul>
  </div>
      </div>
    </nav>
    <router-view></router-view>
    </div>
        <script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>
    </body>
</html>
