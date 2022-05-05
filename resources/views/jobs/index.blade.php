@extends('layouts.app')
@section('content')
    <h1>Jobs ({{ $jobs->count() }})</h1>
    <a href="{{ route('jobs.create') }}">Create</a>
    <br>
    <ul>
        @foreach($jobs as $job)
        <li>
            <strong>{{ $job->name }}</strong>
            <a href="{{ route('jobs.show', $job) }}">Show</a>
            <small>{{ $job->isAvailable() ? 'Yes' : 'No' }}</small>
        </li>
        @endforeach
    </ul>
@endsection
