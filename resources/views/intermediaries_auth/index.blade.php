@extends('app', ['navigation_hidden' => true])
@section('content')
<small>Authenticated intermediary</small>
<h1>{{ $intermediary->name }} ({{ $intermediary->alias }})</h1>
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
        @foreach($works as $work)
        <tr>
            <td>{{ $work->job_name }}</td>
            <td>
                <span>{{ $work->client->address }}, {{ $work->client->zip_code }}</span><br>
                <span>{{ $work->client->location }}</span><br>
                <small>{{ $work->client->fullname }} / {{ $work->client->phone }}</small><br>
            </td>
            <td>{{ $work->intermediary->alias }}</td>
            <td>{{ ucfirst($work->status) }}</td>
            <td>
                <a href="{{ route('intermediaries_auth.show', $work) }}">Show</a>
            </td>
        </tr>  
        @endforeach
    </tbody>
</table>
@endsection
