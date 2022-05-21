@extends('app')
@section('content')
<a href="{{ route('operators.index') }}">Index</a>
<h1>{{ $operator->fullname }}</h1>
<ul>
    <li>
        <small>Available</small>
        <span>{{ $operator->isAvailable() ? 'Yes' : 'No' }}</span>
    </li>
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

        @if( $operator->hasCrew() )
        <span>{{ $operator->crew->name }}</span>
        <a href="{{ route('crews.show', $operator->crew) }}">Show</a>

        @else
        <span>-</span>

        @endif
    </li>
    <li>
        <small>Skills</small>
        <ul>
            @foreach($operator->skills as $skill)
            <li>{{ $skill->name }}</li>
            @endforeach
        </ul>
    </li>
</ul>

<p>
    <small>Works ({{ $operator->works->count() }})</small>
</p>
<ul>
    @foreach($operator->works->load('job') as $work)
    <li>
        <span>{{ $work->job_name }}</span>
        <a href="{{ route('works.show', $work) }}">Show</a>
    </li>
    @endforeach
</ul>
<br>
<a href="{{ route('operators.edit', $operator) }}">Edit</a>
@endsection
