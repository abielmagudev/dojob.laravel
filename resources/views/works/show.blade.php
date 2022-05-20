@extends('app')
@section('content')
<a href="{{ route('works.index') }}">Index</a>
<h1>{{ $work->job_name }}</h1>
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
        <small>Intermediary</small>
        <ul>
            @if( $work->hasIntermediary() )
            <li>{{ $work->intermediary->name }}</li>
            <li>{{ $work->intermediary->contact }}</li>
            <li>{{ $work->intermediary->phone }}</li>

            @else
            <li></li>
            
            @endif
        </ul>
    </li>
    <li>
        @if( $work->hasCrew() )
        <small>Crew assigned</small>
        <ul>
            <li>{{ $work->crew->name }}</li>
            <ul>
                @foreach($work->operators as $operator)
                <li>{{ $operator->fullname }} ({{ $operator->position ?? '?' }})</li>
                @endforeach
            </ul>
        </ul>
            
        @else
        <small>Operator assigned</small>
        <ul>
            <li>{{ $work->singleOperator()->fullname }}</li>
        </ul>

        @endif
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
            <li>
                <a href="{{ route('works.warranties', $work) }}">Manage warranties</a>
            </li>
            @foreach($work->warranties->sortByDesc('id') as $warranty) 
            <li>
                <span>{{ $warranty->title }}</span>
                <span>({{ $work->scheduled_date }} to {{ $warranty->expires }})</span>
            </li>
            @endforeach
        </ul>
    </li>
</ul>
<br>
<a href="{{ route('works.edit',$work) }}">Edit</a>
@endsection
