@extends('app')
@section('content')
<a href="{{ route('jobs.create') }}">Create</a>
<h1>Jobs ({{ $jobs->count() }})</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Works</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
        <tr>
            <td>{{ $job->name }}</td>
            <td>{{ $job->works_count }}</td>
            <td>
                <a href="{{ route('jobs.show', $job) }}">Show</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
