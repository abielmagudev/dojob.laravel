<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    @auth   
    <div style="text-align:right">
        <span>{{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="post" style="display:inline-block">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    @endauth

    @if(! isset($navigation_hidden) )      
    <div style="display:inline-block; vertical-align:top; margin-right:2rem">
        @include('layouts.navigation')
    </div>
    @endif

    <div style="display:inline-block; word-break:break-all">
        @include('layouts.message')
        @include('layouts.errors')
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
