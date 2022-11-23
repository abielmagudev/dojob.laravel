<?php
$routes = [
    'Dashboard' => url('/'),
    'Works' => route('works.index'),
    // 'Warranties' => route('warranties.index'),
    'Jobs' => route('jobs.index'),
    'Plugins' => route('plugins.index'),
    'Intermediaries' => route('intermediaries.index'),
    'Members' => route('members.index'),
    'Crews' => route('crews.index'),
    'Users' => route('users.index'),
    'Clients' => route('clients.index'),
    //'Skills' => route('skills.index'),
];
?>
<br>
<nav class="nav nav-pills flex-column">
    @foreach($routes as $title => $route)
    <a href='{{ $route }}' class="nav-link" aria-current="page">{{ $title }}</a>
    @endforeach
</nav>
