@extends('app')
@section('content')
<x-heading>
    <x-slot name='surtitle'>Plugins</x-slot>
    {{ $plugin->name }}
</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit settings</span>
    </div>
    <div class="card-body">
        <form action="{{ route('plugins.update', $plugin) }}" method="post">
            @csrf
            @method('patch')
            <div class='mb-3'>
                @foreach(['one' => 'uno', 'two' => 'dos'] as $name => $value)
                <?php $checkbox_id = 'checkbox' . ucfirst($name) . 'Setting' ?>
                <div>
                    <input class='form-check-input' type="checkbox" name="settings[{{ $name }}]" value="{{ $value }}" id="{{ $checkbox_id }}" {{ $plugin->hasSetting($name) ? 'checked' : '' }}>
                    <label class='form-check-label' for="{{ $checkbox_id }}">{{ ucfirst($name) }}</label> 
                </div>
                @endforeach
            </div>
            <button type="submit" class='btn btn-warning'>Update settings</button>
            <a href="{{ route('plugins.index') }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeletePlugin' header='Delete plugin'>
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
