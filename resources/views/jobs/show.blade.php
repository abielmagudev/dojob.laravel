@extends('app')
@section('content')
<x-heading>
    <x-slot name='surtitle'>Jobs</x-slot>
    {{ $job->name }}
    <x-slot name='subtitle'>{{ $job->isEnabled() ? 'Enabled' : 'Disabled' }}</x-slot>
</x-heading>
<p class=''>
    <em>{{ $job->description }}</em>
</p>
<div class="d-flex justify-content-end mb-3">
    <div class='me-2'>
        @includeWhen($job->isEnabled(), 'jobs._manage_plugins')
    </div>
    <div>
        <a href="{{ route('jobs.edit', $job) }}" class='btn btn-warning'>Edit job</a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <span>Works</span>
        <span class="badge bg-primary">Last {{ $works->count() }}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-none">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Scheduled</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($works as $work)                 
                    <tr>
                        <td>
                            {{ $work->client->fullname }}
                            <br>
                            <small>{{ $work->client->residence }}</small>
                        </td>
                        <td>
                            {{ $work->scheduled_at }}
                        </td>
                        <td>
                            <span class="badge bg-dark text-uppercase">{{ $work->status }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('works.show', $work) }}" class="btn btn-outline-primary">Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
