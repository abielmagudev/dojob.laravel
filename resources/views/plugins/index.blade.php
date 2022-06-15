@extends('app')
@section('content')
<h1>Plugins ({{ $api_plugins->count() }})</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Catalog</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($api_plugins as $api_plugin)
        <tr>
            <td>
                <span>{{ $api_plugin->name }} v{{ $api_plugin->version }}</span>
                <br>
                <small>{{ $api_plugin->description }}</small>
            </td>
            <td>{{ ucfirst($api_plugin->catalog->name) }}</td>
            <td>{{ $api_plugin->isFree() ? 'Free' : $api_plugin->price }}</td>
            <td>
                @if( $plugins->contains('api_plugin_id', $api_plugin->id) )
                <a href="{{ route('plugins.edit', $plugins->firstWhere('api_plugin_id', $api_plugin->id) ) }}">Edit</a>

                @else
                <button type="submit" name="plugin" value="{{ $api_plugin->hashed }}" form="formPluginStore">Purchase</button>

                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if( $api_plugins->count() )
<form action="{{ route('plugins.store') }}" method="post" id="formPluginStore">
    @csrf
</form>
@endif

@endsection
