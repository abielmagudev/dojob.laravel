@extends('app')
@section('content')
<x-heading>Clients</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit client</span>
    </div>
    <div class="card-body">
        <form action="{{ route('clients.update', $client) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            @include('clients._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update client</button>
            <a href="{{ route('clients.show', $client) }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeleteClient' title='Delete client'>
    <x-slot name='trigger' class='link-danger' align='end'>Delete client</x-slot>
    <div class="text-center">
        <p class="lead m-0">{{ $client->fullname }}</p>
        <p>Currently has {{ $client->works->count() }} works.</p>
        <p class="text-muted">Are you sure you want to delete the client?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('clients.destroy', $client) }}" method="post" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Yes, delete client</button>
        </form>
    </x-slot>
</x-modal>
@endsection
