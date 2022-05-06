@extends('app')
@section('content')
<a href="{{ route('clients.index') }}">Index</a>
<h1>{{ $client->fullname }} <small>({{ $client->alias }})</small></h1>
<a href="{{ route('clients.edit', $client) }}">Edit</a>
<ul>
    <li>
        <small>Address</small>
        <span>{{ $client->address }}</span>
    </li>
    <li>
        <small>Zip code</small>
        <span>{{ $client->zip_code }}</span>
    </li>
    <li>
        <small>Location</small>
        <span>{{ $client->location }}</span>
    </li>
    <li>
        <small>Phone</small>
        <span>{{ $client->phone }}</span>
    </li>
    <li>
        <small>Email</small>
        <span>{{ $client->email }}</span>
    </li>
    <li>
        <small>Notes</small>
        <span>{{ $client->notes }}</span>
    </li>
</ul>
<form action="{{ route('clients.destroy', $client) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
@endsection
