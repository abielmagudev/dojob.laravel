@extends('app')
@section('content')
<p>Plugin</p>
<h1>{{ $plugin->name }}</h1>
<form action="{{ route('plugins.update', $plugin) }}" method="post">
    @csrf
    @method('patch')
    <div>
        <label for="">Settings</label>
        <div>
            <input type="checkbox" name="settings[one]" value="uno" id="checkboxOneSetting" {{ $plugin->hasSetting('one') ? 'checked' : '' }}>
            <label for="checkboxOneSetting">One</label> 
        </div>
        <div>
            <input type="checkbox" name="settings[two]" value="dos" id="checkboxTwoSetting" {{ $plugin->hasSetting('two') ? 'checked' : '' }}>
            <label for="checkboxTwoSetting">Two</label> 
        </div>
        <div>
            <input type="checkbox" name="settings[three]" value="tres" id="checkboxThreeSetting" {{ $plugin->hasSetting('three') ? 'checked' : '' }}>
            <label for="checkboxThreeSetting">Three</label> 
        </div>
    </div>
    <br>
    <div>
        <input type="checkbox" name="enabled" value="yes" id="checkboxEnabled" {{ $plugin->isEnabled() ? 'checked' : '' }}>
        <label for="checkboxEnabled">Enabled</label>
        <br>
        <small>You will not be able to use the plugin, but it will keep and display the saved information.</small>
    </div>
    <br>
    <button type="submit">Update plugin</button>
    <a href="{{ route('plugins.index') }}">Back</a>
</form>
<hr>
<form action="{{ route('plugins.destroy', $plugin) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete plugin</button>
</form>
@endsection
