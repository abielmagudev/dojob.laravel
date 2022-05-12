@extends('app')
@section('content')
<a href="{{ route('works.create', mt_rand(1,50)) }}">Create</a>
<h1>Works ({{ $works->count() }})</h1>
<ul>
    @foreach($works as $work)
    <li>
        <span>{{ $work->scheduled_date }}</span>
        <span>-</span>
        <span>{{ $work->job->name }}</span>
        <a href="{{ route('works.show', $work) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
