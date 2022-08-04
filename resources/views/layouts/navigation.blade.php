<?php

$routes = [
    'Clients' => route('clients.index'),
    'Crews' => route('crews.index'),
    'Dashboard' => url('/'),
    'Intermediaries' => route('intermediaries.index'),
    'Jobs' => route('jobs.index'),
    'Members' => route('members.index'),
    'Skills' => route('skills.index'),
    'Users' => route('users.index'),
    'Warranties' => route('warranties.index'),
    'Works' => route('works.index'),
];

?>
<strong>Navigation</strong>
<ul>
    @foreach($routes as $title => $route)
    <li>
        <a href="{{ $route }}">{{ $title }}</a>
    </li>
    @endforeach
</ul>
