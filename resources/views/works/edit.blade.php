@extends('app')
@section('content')
<x-heading>Works</x-heading>
<p>
    <span class="lead">{{ $work->client->fullname }}</span>
    <span class='d-block'>{{ $work->client->residence }}</span>
    <span class='d-block'>{{ $work->client->location }}</span>
    <span class='d-block'>{{ $work->client->contact }}</span>
</p>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit work</span>
    </div>
    <div class="card-body">
        <form action="{{ route('works.update', $work) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            @include('works._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update work</button>
            <a href="{{ route('works.show', $work) }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeleteWork' header='Delete work'>
    <x-slot name='trigger' class='link-danger' align='end'>Delete work</x-slot>
    <div class="text-center">
        <p class="lead m-0">{{ $work->job->name }} ( <em>{{ $work->status }}</em> )</p>
        <p>
            <span class="d-block">{{ $work->client->fullname }}</span>
            <span class='d-block'>{{ $work->client->residence }}</span>
            <span class='d-block'>{{ $work->client->location }}</span>
        </p>
        <p class="text-muted">Are you sure you want to delete the work?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('works.destroy', $work) }}" method="post" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Yes, delete work</button>
        </form>
    </x-slot>
</x-modal>
@endsection
