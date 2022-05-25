@extends('app', ['navigation_hidden' => true])
@section('content')
<a href="{{ route('operators_auth.index') }}">Index</a>
<h1>{{ $work->job_name }}</h1>
<p>{{ $work->notes }}</p>

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
