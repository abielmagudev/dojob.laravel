@extends('app')
@section('content')
<x-heading>{{ $work->job_name }}</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New warranty</span>
    </div>
    <div class="card-body">
        <form action="{{ route('warranties.store') }}" method="post" autocomplete="off">
            @csrf
            @include('warranties._form')
            <br>
            <button type="submit" class='btn btn-success'>Save warranty</button>
            <a href="{{ route('works.show', $work) }}" class='btn btn-primary'>Cancel</a>
        </form>
    </div>
</div>
@endsection
