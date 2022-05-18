<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div style="display:inline-block; vertical-align:top; margin-right:2rem">
        @include('layouts.navigation')
    </div>

    <div style="display:inline-block">
        @include('layouts.message')
        @include('layouts.errors')
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
