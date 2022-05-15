@extends('app')
@section('content')
<form action="{{ route('jobs.update', $job) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('jobs._form')
    <br>
    <button type="submit">Update job</button>
    <a href="{{ route('jobs.show', $job) }}">Back</a>
</form>
<hr>
<form action="{{ route('jobs.destroy', $job) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete job</button>
</form>
@endsection
