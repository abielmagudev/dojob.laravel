@extends('layouts.app')
@section('content')
<h1>Clients ({{ $clients->count() }})</h1>
<a href="{{ route('clients.create') }}">Create</a>
<ul>
    @foreach($clients as $client)
    <li>
        <span>{{ $client->fullname }}</span>
        <a href="{{ route('clients.show', $client) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
