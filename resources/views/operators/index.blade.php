@extends('app')
@section('content')
<h1>Operators ({{ $operators->count() }})</h1>
<a href="{{ route('operators.create') }}">Create</a>
<ul>
    @foreach($operators as $operator)
    <li>
        <span>{{ $operator->fullname }}</span>
        <a href="{{ route('operators.show', $operator) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
