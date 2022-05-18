@extends('app')
@section('content')
<a href="{{ route('works.index') }}">Index</a>
<h1>{{ $work->job_name }}</h1>
<p>
    <a href="{{ route('works.warranties', $work) }}">Manage warranties</a>
</p>
<ul>
    <li>
        <small>Status</small>
        <ul>
            <li>{{ ucfirst($work->status) }}</li>
        </ul>
    </li>
    <li>
        <small>Priority</small>
        <ul>
            <li>{{ $work->priority }}</li>
        </ul>
    </li>
    <li>
        <small>Client</small>
        <ul>
            <li>{{ $work->client->fullname }}</li>
            <li>{{ $work->client->address }}</li>
            <li>{{ $work->client->location }}</li>
        </ul>        
    </li>
    <li>
        <small>Assign</small>
        <ul>
            <li>{{ $work->hasCrew() ? "{$work->crew->name} Crew" : 'Operator' }}</li>
        </ul>
    </li>
    <li>
        <small>Operator(s)</small>
        <ul>
            @foreach($work->operators as $operator)
            <li>{{ $operator->fullname }} ({{ $operator->position ?? '?' }})</li>
            @endforeach
        </ul>        
    </li>
    <li>
        <small>Dates and times</small>
        <br>
        <ul>
            <li>Created: {{ $work->created_at }}</li>
            <li>Scheduled: {{ $work->scheduled_at }}</li>
            <li>Started: {{ $work->started_at }}</li>
            <li>Finished: {{ $work->finished_at }}</li>
            <li>Closed: {{ $work->closed_at }}</li>
            <li>Updated: {{ $work->updated_at }}</li>
        </ul>
    </li>
    <li>
        <small>Warranties</small>
        <ul>
            @foreach($work->warranties as $warranty) 
            <li>{{ $warranty->expires }}</li>
            @endforeach
        </ul>
    </li>
</ul>
<br>
<a href="{{ route('works.edit',$work) }}">Edit</a>
<form action="{{ route('works.destroy', $work) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete work</button>
</form>
@endsection
