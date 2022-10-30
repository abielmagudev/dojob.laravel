@extends('app')
@section('content')
<x-heading>{{ $job->name }}</x-heading>
<p>
    <em>{{ $job->description }}</em>
</p>
<p class="text-end">
    <a href="{{ route('jobs.edit', $job) }}" class='btn btn-warning'>Edit job</a>
    @if( $job->isEnabled() )
    <a href="{{ route('jobs.plugins.manage', $job) }}" class='btn btn-primary'>Manage plugins</a>
    @endif
</p>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Plugins</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th colspan="2">Connected</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($job->plugins as $plugin)
                    <tr>
                        <td>{{ $plugin->name }}</td>
                        <td>{{ $plugin->created_at }}</td>
                        <td class='text-end'>
                            <a href="#!" class='btn btn-outline-primary'>Settings</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
