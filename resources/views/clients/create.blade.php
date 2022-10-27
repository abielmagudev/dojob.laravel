@extends('app')
@section('content')
<x-heading>Clients</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New client</span>
    </div>
    <div class="card-body">
        <form action="{{ route('clients.store') }}" method="post" autocomplete="off">
            @csrf
            @include('clients._form')
            <br>
            <button type="submit" class="btn btn-success">Save client</button>
            <a href="{{ route('clients.index') }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
</div>
@endsection
