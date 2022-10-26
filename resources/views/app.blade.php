<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-light"> 
    @auth 
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Navbar</span>
            <div class="dropdown">
                <button class="btn border-0 btn-small text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>{{ auth()->user()->profile->fullname }}</span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#">Account</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <button class='dropdown-item' type="submit" form='formLogout'>Logout</button>
                        <form action="{{ route('logout') }}" method="post" id='formLogout'>
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container-fluid">
        <div class='row vh-100'>
            <div class="col-sm col-sm-2 p-0">      
                @if(! isset($navigation_hidden) )      
                    @include('layouts.navigation')
                @endif
            </div>
            <div class="col-sm p-3">
                @include('layouts.message')
                @include('layouts.errors')
                @yield('content')
                <br>
                <br>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
