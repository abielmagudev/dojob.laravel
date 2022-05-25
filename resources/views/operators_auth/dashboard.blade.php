@extends('app', ['navigation_hidden' => true])
@section('content')
<h1>Operator dashboard</h1>
<table>
    <thead>
        <tr>
            <th>Job</th>
            <th>Client</th>
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
            <td>
                <a href="{{ route('operators_auth.show', $work) }}">Show</a>
            </td>
        </tr>  
        @endforeach
    </tbody>
</table>
@if( $operator->hasCrew() )
<hr>
<p>
    <span>{{ $operator->crew->name }}</span>
    <small>(Crew)</small>
</p>
<table>
    <thead>
        <tr>
            <th>Job</th>
            <th>Client</th>
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
            <td>
                <a href="{{ route('operators_auth.show', $work) }}">Show</a>
            </td>
        </tr>  
        @endforeach
    </tbody>
</table>
@endif
@endsection
