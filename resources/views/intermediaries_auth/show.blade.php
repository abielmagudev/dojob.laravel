@extends('app', ['navigation_hidden' => true])
@section('content')
<a href="{{ route('intermediaries_auth.index') }}">Index</a>
<h1>{{ $work->job_name }}</h1>
<ul>
    <li>
        <small>Scheduled</small><br>
        <span>{{ $work->scheduled_at }}</span>
    </li>
    <li>
        <small>Status</small><br>
        <span>{{ ucfirst($work->status) }}</span>
    </li>
    <li>
        <small>Client</small><br>
        <span>{{ $work->client->fullname }}</span>
        <ul>
            <li>{{ $work->client->address }}</li>
            <li>{{ $work->client->location }}</li>
        </ul>
    </li>
    <li>
        <small>Notes</small><br>
        <span>{{ $work->notes }}</span>
    </li>
</ul>
@endsection
