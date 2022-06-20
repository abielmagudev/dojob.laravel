@extends('app')
@section('content')
<a href="{{ route('users.create') }}">Create</a>
<h1>Users ({{ $users->count() }})</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.show', $user) }}">Show</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
