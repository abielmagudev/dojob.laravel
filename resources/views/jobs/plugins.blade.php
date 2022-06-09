@extends('app')
@section('content')
<a href="{{ route('jobs.show', $job) }}">Show</a>
<h1>{{ $job->name }}</h1>
<h2>Manage plugins</h2>
<form action="{{ route('jobs.plugins.manage', $job) }}" method="get">
    <div>
        <label for="selectCatalog">Catalog</label>
        <select name="catalog" id="selectCatalog" onchange="submit()" required>
            <option value="all" selected>All plugins</option>
            @foreach($catalogs as $catalog)
            <option value="{{ $catalog->name }}" {{ $catalog->id == $catalog_selected ? 'selected' : '' }}>{{ ucfirst($catalog->name) }}</option>
            @endforeach
        </select>
    </div>
</form>
<br>
<form action="{{ route('jobs.plugins.connect', $job) }}" method="post">
    @csrf
    @method('put')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Updated</th>
                <th>Price</th>
                <th>Connected</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plugins as $plugin)
            <tr>
                <td>{{ $plugin->name }} <small>({{ $plugin->version }})</small></td>
                <td>{{ $plugin->updated_at }}</td>
                <td>${{ $plugin->price }}</td>
                <td>
                    <input type="checkbox" name="plugins[]" value="{{ $plugin->id }}" {{ $job->hasPlugin($plugin) ? 'checked' : '' }}>
                </td>
            </tr>  
            @endforeach
        </tbody>
    </table>
    <br>
    <button type="submit">Connect plugins</button>
</form>
@endsection
