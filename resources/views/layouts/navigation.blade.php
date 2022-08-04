<?php

$routes = [
    'Dashboard' => url('/'),
    'Clients' => route('clients.index'),
    'Crews' => route('crews.index'),
    'Intermediaries' => route('intermediaries.index'),
    'Jobs' => route('jobs.index'),
    'Operators' => route('operators.index'),
    'Members' => route('members.index'),
    'Skills' => route('skills.index'),
    'Warranties' => route('warranties.index'),
    'Works' => route('works.index'),
    'Users' => route('users.index'),
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
