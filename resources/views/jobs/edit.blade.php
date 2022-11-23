@extends('app')
@section('content')
<x-heading>Jobs</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit job</span>
    </div>
    <div class="card-body">
        <form action="{{ route('jobs.update', $job) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            @include('jobs._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update job</button>
            <a href="{{ route('jobs.show', $job) }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeleteJob' header='Delete job'>
    <x-slot name='trigger' align='end' class='link-danger'>Delete job</x-slot>
    <div class="text-center">
        <p class="lead m-0">{{ $job->name }}</p>
        <p>Works <span class="badge bg-light">{{ $job->works_count }}</span> | Plugins <span class="badge bg-light">{{ $job->plugins_count }}</span></p>
        <p class="text-muted">Are you sure you want to delete the job?</p>
    </div>
    <x-slot name='footer' close='Cancel'>    
        <form action="{{ route('jobs.destroy', $job) }}" method="post" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Yes, delete job</button>
        </form>
    </x-slot>
</x-modal>
@endsection
