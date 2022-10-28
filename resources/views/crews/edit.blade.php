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
    <form action="{{ route('crews.destroy',$crew) }}" method="post" autocomplete="off" id='formDeleteCrew'>
        @csrf
        @method('delete')
        <div class="text-center">
            <p>{{ $crew->name }}</p>
            <p class="text-muted">Are you sure you want to delete the crew?</p>
        </div>
    </form>
    <x-slot name='footer' close='Cancel'>
        <button type="submit" class='btn btn-outline-danger' form='formDeleteCrew'>Yes, delete crew</button>
    </x-slot>
</x-modal>
@endsection
