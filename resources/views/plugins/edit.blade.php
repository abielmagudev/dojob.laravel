@extends('app')
@section('content')
<x-heading>
    {{ $plugin->name }}
    <x-slot name='subtitle'>Plugin</x-slot>
</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit plugin</span>
    </div>
    <div class="card-body">
        <form action="{{ route('plugins.update', $plugin) }}" method="post">
            @csrf
            @method('patch')
            <div class='mb-3'>
                <div class='form-label'>Settings</div>
                <div class="border rounded p-3">
                    @foreach(['one' => 'uno', 'two' => 'dos'] as $name => $value)
                    <?php $checkbox_id = 'checkbox' . ucfirst($name) . 'Setting' ?>
                    <div>
                        <input class='form-check-input' type="checkbox" name="settings[{{ $name }}]" value="{{ $value }}" id="{{ $checkbox_id }}" {{ $plugin->hasSetting($name) ? 'checked' : '' }}>
                        <label class='form-check-label' for="{{ $checkbox_id }}">{{ ucfirst($name) }}</label> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class='mb-3'>
                <label for="checkboxEnabled" class='form-label'>Enabled</label>
                <div class="border rounded p-3">
                    <input class='form-check-input' type="checkbox" name="enabled" value="yes" id="checkboxEnabled" {{ $plugin->isEnabled() ? 'checked' : '' }}>
                    <label class='form-check-label' for="checkboxEnabled" >You will not be able to use the plugin, but it will keep and display the saved information.</label>
                </div>
            </div>
            <br>
            <button type="submit" class='btn btn-warning'>Update plugin</button>
            <a href="{{ route('plugins.index') }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeletePlugin' title='Delete plugin'>
    <x-slot name='trigger' class='link-danger' align='end'>Delete plugin</x-slot>
    <div class="text-center">
        <p class="lead">{{ $plugin->name }}</p>
        <p>How many works has it?...</p>
        <p class="text-muted">Are you sure you want to remove the plugin?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('plugins.destroy', $plugin) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Delete plugin</button>
        </form>
    </x-slot>
</x-modal>
@endsection
