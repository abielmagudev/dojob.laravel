@extends('layouts.app')
@section('content')
<h1>Jobs ({{ $jobs->count() }})</h1>
<a href="{{ route('jobs.create') }}">Create</a>
<ul>
    @foreach($jobs as $job)
    <li>
        <span>{{ $job->name }}</span>
        <a href="{{ route('jobs.show', $job) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
