@extends('app')
@section('content')
<x-heading>Intermediaries</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit intermediary</span>
    </div>
    <div class="card-body">
        <form action="{{ route('intermediaries.update', $intermediary) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            @include('intermediaries._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update intermediary</button>
            <a href="{{ route('intermediaries.show', $intermediary) }}" class='btn btn-primary'>Back</a>
        </form> 
    </div>
</div>
<br>
<x-modal id='formDeleteIntermediary' title='Delete intermediary'>
    <x-slot name='trigger' align='end' class='link-danger'>Delete intermediary</x-slot>
    <div class="text-center">
        <p class="lead mb-0">{{ $intermediary->nameWithAlias }}</p>
        <p>{{ $intermediary->contact }}</p>
        <p class="text-muted">Are you sure you want to delete the intermediary?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('intermediaries.destroy', $intermediary) }}" method="post" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Delete intermediary</button>
        </form>
    </x-slot>
</x-modal>
@endsection
