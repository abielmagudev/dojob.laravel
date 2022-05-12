@extends('app')
@section('content')
<p>
    <a href="{{ route('works.index') }}">Index</a>
</p>

@if( $client->id )
<p>
    <small>Client</small>
</p>
<ul>
    <li><b>{{ $client->fullname }}</b></li>
    <li>{{ $client->address }}, {{ $client->zip_code }}</li>
    <li>{{ $client->location }}</li>
    <li>{{ $client->phone }}</li>
    <li>{{ $client->email }}</li>
</ul>
@endif
<hr>
<br>

<form action="{{ route('works.store') }}" method="post" autocomplete="off">
    @csrf
    <input type="hidden" name="client" value="{{ $client->id }}">

    <div>
        <label for="selectJob">Job</label>
        <select name="job" id="selectJob">
            <option disabled selected></option>
            @foreach($jobs->where('custom', false) as $job)
            <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ?: 'selected' }}>{{ $job->name }}</option>
            @endforeach
            <optgroup label="New">
                @foreach($jobs->where('custom', true)->sortBy('name') as $job)
                <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ?: 'selected' }}>{{ $job->name }}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
        
    <div style="display: none;">
        <label for="selectWork">Work</label>
        <select name="work" id="selectWork">
            <option disabled selected></option>
            @foreach($client->works->load('job')->sortByDesc('scheduled_date') as $worked)
            <option value="{{ $worked->id }}" {{ old('work', $work->id) <> $worked->id ?: 'selected' }}>{{ $worked->scheduled_date }} - {{ $worked->job->name }}</option>
            @endforeach
        </select>
    </div>

    <br>

    <div>
        <label for="selectCrew">Crew</label>
        <select name="crew" id="selectCrew">
            <option label="- No crew -" selected></option>
            @foreach($crews as $crew)
            <option value="{{ $crew->id }}" {{ old('crew', $work->crew_id) <> $crew->id ?: 'selected' }}>{{ $crew->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="selectOperator">Operator</label>
        <select name="operator" id="selectOperator">
            <option label="- No operator -" selected></option>
            @foreach($operators as $operator)
            <option value="{{ $operator->id }}" {{ old('operator') <> $operator->id ?: 'selected' }}>{{ $operator->fullname }}</option>
            @endforeach
        </select>
    </div>

    <br>

    <div>
        <label for="inputScheduledDate">Scheduled date</label>
        <input type="date" name="scheduled_date" value="{{ old('scheduled_date', $work->scheduled_date) }}" id="inputScheduledDate">
    </div>
    <div>
        <label for="inputScheduledTime">Scheduled time</label>
        <input type="time" name="scheduled_time" value="{{ old('scheduled_time', $work->scheduled_time) }}" id="inputScheduledTime">
    </div>

    <br>

    <button type="submit">Save work</button>
    <a href="{{ route('works.index') }}">Cancel</a>
</form>
@endsection
