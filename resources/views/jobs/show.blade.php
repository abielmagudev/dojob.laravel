@extends('app')
@section('content')
<a href="{{ route('jobs.index') }}">Index</a>
<h1>{{ $job->name }}</h1>
<ul>
    <li>
        <small>Description</small>
        <span>{{ $job->description }}</span>
    </li>
    <li>
        <small>Enabled</small>
        <span>{{ $job->isEnabled() ? 'Yes' : 'No' }}</span>
    </li>
</ul>
<br>
<a href="{{ route('jobs.edit', $job) }}">Edit</a>
<form action="{{ route('jobs.destroy', $job) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete job</button>
</form>
@endsection
