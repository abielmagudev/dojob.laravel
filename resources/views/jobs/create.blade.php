@extends('layouts.app')
@section('content')
<form action="{{ route('jobs.store') }}" method="post" autocomplete="off">
    @csrf
    @include('jobs._form')
    <br>
    <button type="submit">Save job</button>
    <a href="{{ route('jobs.index') }}">Cancel</a>
</form>
@endsection
