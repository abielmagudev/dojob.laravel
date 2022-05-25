@extends('app', ['navigation_hidden' => true])
@section('content')
<a href="{{ route('operators_auth.index') }}">Index</a>
<h1>{{ $work->job_name }}</h1>
<p>
    <small>Notes</small><br>
    <span>{{ $work->notes }}</span>
</p>
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
            <li>{{ $work->client->phone }}</li>
        </ul>
    </li>
</ul>

@if(! $work->hasStarted() ||! $work->hasFinished() ) 
<?php $button_name = $work->hasStarted() ? 'finish' : 'start' ?>
<hr>
<form action="{{ route('operators_auth.update', $work) }}" method="post">
    @csrf
    @method('patch')
    <button type="submit" name="{{ $button_name }}" value="yes">{{ ucfirst($button_name) }}</button>
</form>
@endif
@endsection
