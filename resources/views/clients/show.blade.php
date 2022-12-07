@extends('app')
@section('content')
<x-heading>
    {{ $client->fullname }}
    @if( $client->hasAlias() )
    <x-slot name='subtitle'>{{ $client->alias }}</x-slot>
    @endif
</x-heading>
<p class="text-muted mb-1">{{ $client->address }}, {{ $client->zip_code }}, {{ $client->location }}</p>
<p class="text-muted">{{ $client->email }}, {{ $client->phone }}</p>
<p class="text-end">
    <a class='btn btn-warning' href="{{ route('clients.edit', $client) }}">Edit client</a>
    <a class='btn btn-primary' href="{{ route('works.create', $client) }}">New work</a>
</p>
<div class="card">
    <div class="card-header">
        <span class='text-uppercase align-middle'>Works</span>
        <span class='badge bg-primary'>{{ $client->works->count() }}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-none">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Members</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client->works->load(['job','members']) as $work)
                    <tr>
                        <td>{{ $work->job->name }}</td>
                        <td>{{ $work->members->implode('fullname', ',') }}</td>
                        <td class='text-end'>
                            <a class='btn btn-outline-primary' href="{{ route('works.show', $work) }}">Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
