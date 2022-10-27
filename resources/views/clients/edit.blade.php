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
@if(! $client->hasWorks() )
<hr>
<form action="{{ route('clients.destroy', $client) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete client</button>
</form>
@endif
@endsection
