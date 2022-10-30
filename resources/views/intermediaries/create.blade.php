@extends('app')
@section('content')
<x-heading>Intermediaries</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New intermediary</span>
    </div>
    <div class="card-body">
        <form action="{{ route('intermediaries.store') }}" method="post" autocomplete="off">
            @csrf
            @include('intermediaries._form')
            <button type="submit" class='btn btn-success'>Create intermediary</button>
            <a href="{{ route('intermediaries.index') }}" class='btn btn-primary'>Cancel</a>
        </form> 
    </div>
</div>
@endsection
