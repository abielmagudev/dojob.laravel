@extends('app')
@section('content')
<x-heading>Plugins ({{ $api_plugins->count() }})</x-heading>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
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
                        <td>{{ $api_plugin->isFree() ? 'Free' : "$ {$api_plugin->price}" }}</td>
                        <td class='text-end'>
                            @if( $plugins->contains('api_plugin_id', $api_plugin->id) )
                            <a href="{{ route('plugins.edit', $plugins->firstWhere('api_plugin_id', $api_plugin->id) ) }}" class='btn btn-warning'>Edit</a>
            
                            @else
                            <button type="submit" name="plugin" value="{{ $api_plugin->hashed }}" form="formPluginStore" class='btn btn-success'>Purchase</button>
            
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if( $api_plugins->count() )
<form action="{{ route('plugins.store') }}" method="post" id="formPluginStore">
    @csrf
</form>
@endif

@endsection
