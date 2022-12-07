@extends('app')
@section('content')
<x-heading>Plugins</x-heading>

<div class="d-md-flex justify-content-end mb-3">
    <form action="{{ route('plugins.index') }}" method='get'>
        <div class="input-group mb-3">
            <label class="input-group-text bg-dark text-white" for="selectCatalog">Catalog</label>
            <select name="catalog" id="selectCatalog" class="form-select" onchange='this.form.submit()'>
                <option value='any' selected>Any</option>
                @foreach($api_catalogs as $catalog)
                <option value="{{ $catalog->slug }}" {{ $catalog->id == $api_catalog_selected->id ? 'selected' : '' }}>{{ $catalog->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class='d-none d-md-table-cell'>Version</th>
                        <th class='d-none d-md-table-cell'>Catalog</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($api_plugins as $api_plugin)
                    <tr>
                        <td style='min-width:204px'>
                            <span>{{ $api_plugin->name }}</span>
                            <br>
                            <small class='text-muted'>{{ $api_plugin->description }}</small>
                        </td>
                        <td>{{ $api_plugin->version }}</td>
                        <td class='d-none d-md-table-cell'>{{ ucfirst($api_plugin->catalog->name) }}</td>
                        <td>{{ $api_plugin->isFree() ? 'Free' : $api_plugin->the_price }}</td>
                        <td class='text-end' style='width:166px'>
                            @if( $plugins->contains('api_plugin_id', $api_plugin->id) )
                            <a href="{{ route('plugins.edit', $plugins->firstWhere('api_plugin_id', $api_plugin->id) ) }}" class='btn btn-outline-primary w-100'>Configuration</a>
            
                            @else
                            <button type="submit" name="plugin" value="{{ $api_plugin->hashed }}" form="formPluginStore" class='btn btn-success w-100'>Purchase</button>
            
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
