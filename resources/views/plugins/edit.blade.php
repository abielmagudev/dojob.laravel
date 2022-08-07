@extends('app')
@section('content')
<p>Plugin</p>
<h1>{{ $plugin->name }}</h1>
<form action="{{ route('plugins.update', $plugin) }}" method="post">
    @csrf
    @method('patch')
    <div>
        <label for="">Settings</label>
        @foreach(['one' => 'uno', 'two' => 'dos'] as $name => $value)
        <?php $checkbox_id = 'checkbox' . ucfirst($name) . 'Setting' ?>
        <div>
            <input type="checkbox" name="settings[{{ $name }}]" value="{{ $value }}" id="{{ $checkbox_id }}" {{ $plugin->hasSetting($name) ? 'checked' : '' }}>
            <label for="{{ $checkbox_id }}">{{ ucfirst($name) }}</label> 
        </div>
        @endforeach
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
