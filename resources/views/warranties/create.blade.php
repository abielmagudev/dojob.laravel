@extends('app')
@section('content')
<h1>{{ $work->job->name }}</h1>
<form action="{{ route('warranties.store') }}" method="post" autocomplete="off">
    @csrf
    @include('warranties._form')
    <br>
    <button type="submit">Save work</button>
    <a href="{{ route('warranties.index') }}">Cancel</a>
</form>
@endsection
