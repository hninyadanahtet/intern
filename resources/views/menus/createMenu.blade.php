<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            @auth
                            <a class="nav-link text-success"
                            href="/restaurants"> Restaurants </a>
                            @endauth 
                            </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="users/login">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="users/register">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/logout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if($errors->any())
                   <div class="alert alert-warning">
                       <ol>
                           @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                           @endforeach
                       </ol>
                   </div>
                   @endif
            </div>
            <h1> Create Menu</h1>
            <form action="{{ route('menus.store')}}" method="POST" enctype="multipart/form-data">
               
                @csrf
           
                <input type="hidden" name="restaurant_id" value="{{$restaurant_id}}">
                <div class="container form-group">
                    <label>Menu_types</label>
                    <select class="form-control col-md-5" name="menu_type_id">
                        <option>Choose....</option>
                    @foreach($menu_types as $menu_type)
                        <option value="{{ $menu_type->id }}">
                        {{ $menu_type->name }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class=" container form-group">
                    <label>Menu Name</label>
                    <input type="text" name="name" class="form-control col-md-5" placeholder="Menu Name">
                </div>
               
                <div class=" container form-group">
                    <label>Price</label>
                    <input type="text" name="price" placeholder="Menu Price">
                </div>

                <div class="container form-group">
                    <input type="file" name="photos">
                </div>
               
                <div class="container form-group">
                    <button class="btn btn-info">Create Menu</button>
                </div>
        
        </main>
    </div>
</body>
</html>

   