@extends('app')
@section('content')
<a href="{{ route('users.create') }}">Create</a>
<h1>Users ({{ $users->count() }})</h1>
<ul>
    @foreach($users as $user)
    <li>
        <span>{{ $user->name }}</span>
        <a href="{{ route('users.show', $user) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
