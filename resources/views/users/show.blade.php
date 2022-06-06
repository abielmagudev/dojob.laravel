@extends('app')
@section('content')
<a href="{{ route('users.index') }}">Index</a>
<h1>{{ $user->name }}</h1>
<ul>
    <li>{{ $user->email }}</li>
    <li>{{ $user->updated_at }}</li>
</ul>
<a href="{{ route('users.edit', $user) }}">Edit</a>
@endsection
