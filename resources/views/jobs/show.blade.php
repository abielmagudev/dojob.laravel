@extends('layouts.app')
@section('content')
<a href="{{ route('jobs.index') }}">Index</a>
<h1>{{ $job->name }}</h1>
<a href="{{ route('jobs.edit', $job) }}">Edit</a>
<p>{{ $job->description }}</p>
<br>

<form action="{{ route('jobs.destroy', $job) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
@endsection
