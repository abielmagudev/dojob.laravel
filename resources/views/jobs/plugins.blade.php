@extends('app')
@section('content')
<x-heading>
    {{ $job->name }}
    <x-slot name='subtitle'>Manage plugins</x-slot>
</x-heading>
<p class="">
    <a href="{{ route('jobs.show', $job) }}" class='btn btn-primary'>Back</a>
</p>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Plugins</span>
    </div>
    <div class="card-body">
        <form action="{{ route('jobs.plugins.connect', $job) }}" method="post">
            @csrf
            @method('put')
            <div class="table-responsive">
                <table class='table table-hover align-middle shadow-none'>
                    <thead>
                        <tr>
                            <th></th>
                            <th colspan="2">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plugins as $plugin)
                        <?php $checkbox_id = 'checkboxPlugin' . $plugin->id ?>
                        <tr>
                            <td style='width:1%'>
                                <input class='form-check-input' id="{{ $checkbox_id }}" type="checkbox" name="plugins[]" value="{{ $plugin->id }}" {{ $job->hasPlugin($plugin) ? 'checked' : '' }}>
                            </td>
                            <td>
                                <label class='form-check-label' for="{{ $checkbox_id }}">{{ $plugin->name }}</label>
                            </td>
                            <td class='text-end'>
                                <button type="submit" class='btn btn-success'>Connect</button>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection
