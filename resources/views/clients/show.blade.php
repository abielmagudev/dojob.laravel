@extends('app')
@section('content')
<a href="{{ route('clients.index') }}">Index</a>
<h1>{{ $client->fullname }} <small>({{ $client->alias }})</small></h1>
<p>
    <small>Information</small>
</p>
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
<p>
    <small>Works</small>
</p>
<ul>
    @foreach($client->works->load('job') as $work)
    <li>
        <span>{{ $work->job_name }}</span>
        <a href="{{ route('works.show', $work) }}">Show</a>
    </li>
    @endforeach
</ul>
<a href="{{ route('clients.edit', $client) }}">Edit</a>
@endsection
