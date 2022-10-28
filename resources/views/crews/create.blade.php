@extends('app')
@section('content')
<x-heading>Crews</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New crew</span>
    </div>
    <div class="card-body">
        <form action="{{ route('crews.store') }}" method="post" autocomplete="off">
            @csrf
            @include('crews._form')
            <br>
            <button type="submit" class='btn btn-success'>Save crew</button>
            <a href="{{ route('crews.index') }}" class='btn btn-primary'>Cancel</a>
        </form>
    </div>
</div>
@endsection
