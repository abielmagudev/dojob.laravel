@extends('app')
@section('content')
<x-heading>Skills</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New skill</span>
    </div>
    <div class="card-body">
        <form action="{{ route('skills.store') }}" method="post" autocomplete="off">
            @csrf
            @include('skills._form')
            <br>
            <button type="submit" class='btn btn-success'>Save skill</button>
            <a href="{{ route('skills.index') }}" class='btn btn-primary'>Cancel</a>
        </form>
    </div>
</div>
@endsection
