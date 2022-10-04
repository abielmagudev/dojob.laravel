@extends('app')
@section('content')
<a href="{{ route('clients.create') }}">Create</a>
<h1>Clients ({{ $clients->count() }})</h1>
<i class="bi bi-person-heart"></i>
<ul>
    @foreach($clients as $client)
    <li>
        <span>{{ $client->fullname }}</span>
        <a href="{{ route('clients.show', $client) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
