@extends('app')
@section('content')
<x-heading>Jobs</x-heading>
<p class="text-end">
    <a href="{{ route('jobs.create') }}" class='btn btn-primary'>New job</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Enabled</th>
                        <th>Plugins</th>
                        <th colspan="2">Works</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->name }}</td>
                        <td>{{ $job->isEnabled() ? 'Yes' : 'No' }}</td>
                        <td>{{ $job->plugins_count }}</td>
                        <td>{{ $job->works_count }}</td>
                        <td class='text-end'>
                            <a href="{{ route('jobs.show', $job) }}" class='btn btn-outline-primary'>Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

<x-simple-pagination :collection="$jobs"></x-simple-pagination>
@endsection
