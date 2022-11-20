<?php
$routes = [
    'Clients' => route('clients.index'),
    'Crews' => route('crews.index'),
    'Dashboard' => url('/'),
    'Intermediaries' => route('intermediaries.index'),
    'Jobs' => route('jobs.index'),
    'Members' => route('members.index'),
    'Plugins' => route('plugins.index'),
    //'Skills' => route('skills.index'),
    'Users' => route('users.index'),
    'Warranties' => route('warranties.index'),
    'Works' => route('works.index'),
];
?>
<br>
<nav class="nav nav-pills flex-column">
    @foreach($routes as $title => $route)
    <a href='{{ $route }}' class="nav-link" aria-current="page">{{ $title }}</a>
    @endforeach
</nav>
