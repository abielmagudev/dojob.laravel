@extends('app')
@section('content')
<h1>{{ $work->job_name}}</h1>
<form action="{{ route('warranties.store') }}" method="post" autocomplete="off">
    @csrf
    @include('warranties._form')
    <br>
    <button type="submit">Create warranty</button>
    <a href="{{ route('works.warranties', $work) }}">Cancel</a>
</form>
@endsection
