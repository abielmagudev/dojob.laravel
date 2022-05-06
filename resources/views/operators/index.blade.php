@extends('app')
@section('content')
<a href="{{ route('operators.create') }}">Create</a>
<h1>Operators ({{ $operators->count() }})</h1>
<ul>
    @foreach($operators as $operator)
    <li>
        <span>{{ $operator->fullname }}</span>
        <a href="{{ route('operators.show', $operator) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
