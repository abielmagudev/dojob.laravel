@extends('app')
@section('content')
<x-heading>Works</x-heading>
<p>
    <span class="lead">{{ $client->fullname }}</span>
    <span class="d-block">{{ $client->residence }}, {{ $client->location }}</span>
    <span class="d-block">{{ $client->contact }}</span>
</p>

<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New work</span>
    </div>
    <div class="card-body">
        <form action="{{ route('works.store') }}" method="post" autocomplete="off">
            @csrf
            @include('works._form')
            <br>
            <button type="submit" class='btn btn-success'>Save work</button>
            <a href="{{ route('works.index') }}" class='btn btn-primary'>Cancel</a>
        </form>
    </div>
</div>
<br>
@endsection
