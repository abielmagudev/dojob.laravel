@extends('app')
@section('content')
<a href="{{ route('intermediaries.create') }}">Create</a>
<h1>Intermediaries ({{ $intermediaries->count() }})</h1>
<ul>
    @foreach($intermediaries as $intermediary)
    <li>
        <span>{{ $intermediary->name }} ({{ $intermediary->alias }})</span>
        <a href="{{ route('intermediaries.show', $intermediary) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
