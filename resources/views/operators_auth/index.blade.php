@extends('app', ['navigation_hidden' => true])
@section('content')
<small>Authenticated operator</small>
<h1>{{ $operator->fullname }} ({{ $operator->position ?? '?' }})</h1>
<table>
    <thead>
        <tr>
            <th>Job</th>
            <th>Client</th>
            <th>Intermediary</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($works->whereNull('crew_id') as $work)
        <tr>
            <td>{{ $work->job_name }}</td>
            <td>
                <span>{{ $work->client->address }}, {{ $work->client->zip_code }}</span><br>
                <span>{{ $work->client->location }}</span><br>
                <small>{{ $work->client->fullname }} / {{ $work->client->phone }}</small><br>
            </td>
            <td>{{ $work->hasIntermediary() ? $work->intermediary->alias : '-'  }}</td>
            <td>{{ ucfirst($work->status) }}</td>
            <td>
                <a href="{{ route('operators_auth.show', $work) }}">Show</a>
            </td>
        </tr>  
        @endforeach
    </tbody>
</table>
@if( $operator->hasCrew() )
<hr>
<h3>
    <span>{{ $operator->crew->name }}</span>
    <small>(Crew)</small>
</h3>
<table>
    <thead>
        <tr>
            <th>Job</th>
            <th>Client</th>
            <th>Intermediary</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($works->whereNotNull('crew_id') as $work)
        <tr>
            <td>{{ $work->job_name }}</td>
            <td>
                <span>{{ $work->client->address }}, {{ $work->client->zip_code }}</span><br>
                <span>{{ $work->client->location }}</span><br>
                <small>{{ $work->client->fullname }} / {{ $work->client->phone }}</small><br>
            </td>
            <td>{{ $work->hasIntermediary() ? $work->intermediary->alias : '-'  }}</td>
            <td>{{ ucfirst($work->status) }}</td>
            <td>
                <a href="{{ route('operators_auth.show', $work) }}">Show</a>
            </td>
        </tr>  
        @endforeach
    </tbody>
</table>
@endif
@endsection
