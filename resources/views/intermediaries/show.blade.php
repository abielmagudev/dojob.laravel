@extends('app')
@section('content')
<a href="{{ route('intermediaries.index') }}">Index</a>
<h1>{{ $intermediary->name }} ({{ $intermediary->alias }})</h1>
<div>
    <ul>
        <li>
            <small>Contact</small>
            <span>{{ $intermediary->contact }}</span>
        </li>
        <li>
            <small>Phone</small>
            <span>{{ $intermediary->phone }}</span>
        </li>
        <li>
            <small>Email</small>
            <span>{{ $intermediary->email }}</span>
        </li>
        <li>
            <small>Notes</small>
            <span>{{ $intermediary->notes }}</span>
        </li>
        <li>
            <small>Available</small>
            <span>{{ $intermediary->isAvailable() ? 'Yes' : 'No' }}</span>
        </li>
    </ul>
    <a href="{{ route('intermediaries.edit', $intermediary) }}">Edit</a>
</div>
@endsection
