@extends('app')
@section('content')
<x-heading>Jobs</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New job</span>
    </div>
    <div class="card-body">
        <form action="{{ route('jobs.store') }}" method="post" autocomplete="off">
            @csrf
            @include('jobs._form')
            <br>
            <button type="submit" class='btn btn-success'>Save job</button>
            <a href="{{ route('jobs.index') }}" class='btn btn-primary'>Cancel</a>
        </form>
    </div>
</div>
@endsection
