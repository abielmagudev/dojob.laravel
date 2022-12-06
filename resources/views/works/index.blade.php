@extends('app')
@section('content')
<x-heading>Works ({{ $works->count() }})</x-heading>
<p class="text-end">
    <a href="{{ route('works.create', mt_rand(1,50)) }}" class='btn btn-primary'>New work</a>
</p>
<div class="card">
    <div class="card-header">
        <span>Today</span>
        <span class="badge bg-primary">{{ $today->count() }}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
                <thead>
                    <tr>
                        <th>Job</th>
                        <th>Client</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($today as $work )
                    <tr>
                        <td class='text-nowrap d-none'>{{ $work->scheduled_date }}</td>
                        <td>{{ $work->job->name }}</td>
                        <td>
                            <span class="d-block">{{ $work->client->fullname }}</span>
                            <span class="d-block">{{ $work->client->residence }}</span>
                        </td>
                        <td class='text-nowrap text-end'>
                            <a href="{{ route('works.show', $work) }}" class='btn btn-outline-primary'>Show</a>
                            <a href="{{ route('works.edit', $work) }}" class='btn btn-outline-warning'>Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
