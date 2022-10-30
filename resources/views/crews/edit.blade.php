@extends('app')
@section('content')
<x-heading>Crews</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit crew</span>
    </div>
    <div class="card-body">
        <form action="{{ route('crews.update', $crew) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            @include('crews._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update crew</button>
            <a href="{{ route('crews.show', $crew) }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeleteCrew' title='Delete crew'>
    <x-slot name='trigger' class='link-danger' align='end'>Delete crew</x-slot>
    <div class="text-center">
        <p>{{ $crew->name }}</p>
        <p class="text-muted">Are you sure you want to delete the crew?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('crews.destroy',$crew) }}" method="post" autocomplete="off" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Yes, delete crew</button>
        </form>
    </x-slot>
</x-modal>
@endsection
