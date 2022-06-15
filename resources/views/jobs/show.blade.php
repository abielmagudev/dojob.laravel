@extends('app')
@section('content')
<a href="{{ route('jobs.index') }}">Index</a>
<h1>{{ $job->name }}</h1>
<p>{{ $job->description }}</p>
<ul>
    <li>
        <small>Works</small>
        <span>{{ $job->works->count() }}</span>
    </li>
    <li>
        <small>Enabled</small>
        <span>{{ $job->isEnabled() ? 'Yes' : 'No' }}</span>
    </li>
</ul>
<br>
<a href="{{ route('jobs.edit', $job) }}">Edit</a>
<hr>
<p>
    <a href="{{ route('jobs.plugins.manage', $job) }}">Manage plugins</a>
</p>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Connected</th>
        </tr>
    </thead>
    <tbody>
        @foreach($job->plugins as $plugin)
        <tr>
            <td>{{ $plugin->name }}</td>
            <td>{{ $plugin->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
