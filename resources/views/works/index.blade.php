@extends('app')
@section('content')
<a href="{{ route('works.create', mt_rand(1,50)) }}">Create</a>
<h1>Works ({{ $works->count() }})</h1>
<table>
    <thead>
        <tr>
            <th>Schedule</th>
            <th>Job</th>
            <th>Intermediary</th>
            <th>Client</th>
            <th>Crew</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($works as $work)
        <tr>
            <td>{{ $work->scheduled_date }}</td>
            <td>{{ $work->job->name }}</td>
            <td>{{ $work->intermediary->name ?? '-' }}</td>
            <td>{{ $work->client->name }}</td>
            <td>{{ $work->crew->name ?? '-' }}</td>
            <td>
                <a href="{{ route('works.show', $work) }}">Show</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
