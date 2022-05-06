@extends('app')
@section('content')
<a href="{{ route('operators.index') }}">Index</a>
<h1>{{ $operator->fullname }}</h1>
<ul>
    <li>
        <small>Phone</small>
        <span>{{ $operator->phone }}</span>
    </li>
    <li>
        <small>Email</small>
        <span>{{ $operator->email }}</span>
    </li>
    <li>
        <small>Date of birth</small>
        <span>{{ $operator->birthdate }}</span>
    </li>
    <li>
        <small>Notes</small>
        <span>{{ $operator->notes }}</span>
    </li>
    <li>
        <small>Crew</small>
        <span>{{ $operator->hasCrewed() ? $operator->crew->name : 'None' }}</span>
    </li>
</ul>
<br>
<a href="{{ route('operators.edit', $operator) }}">Edit</a>
<form action="{{ route('operators.destroy', $operator) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete operator</button>
</form>
@endsection
