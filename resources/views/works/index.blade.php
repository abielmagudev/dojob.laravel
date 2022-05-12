@extends('app')
@section('content')
<a href="{{ route('works.create', mt_rand(1,50)) }}">Create</a>
<h1>Works ({{ $works->count() }})</h1>
<ul>
    @foreach($works as $work)
    <li>{{ $work->job->name }}</li>
    @endforeach
</ul>
@endsection
