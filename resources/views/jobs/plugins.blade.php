@extends('app')
@section('content')
<a href="{{ route('jobs.show', $job) }}">Show</a>
<h1>{{ $job->name }}</h1>
<h2>Manage plugins</h2>
<form action="{{ route('jobs.plugins.connect', $job) }}" method="post">
    @csrf
    @method('put')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Connected</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plugins as $plugin)
            <?php $checkbox_id = 'checkboxPlugin' . $plugin->id ?>
            <tr>
                <td>
                    <label for="{{ $checkbox_id }}">{{ $plugin->name }}</label>
                </td>
                <td>
                    <input id="{{ $checkbox_id }}" type="checkbox" name="plugins[]" value="{{ $plugin->id }}" {{ $job->hasPlugin($plugin) ? 'checked' : '' }}>
                </td>
            </tr>  
            @endforeach
        </tbody>
    </table>
    <br>
    <button type="submit">Connect plugins</button>
</form>
@endsection
