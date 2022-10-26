@extends('app')
@section('content')
<x-heading>Members</x-heading>
<div class="card border-0">
    <div class="card-header">
        <span class="text-uppercase">New member</span>
    </div>
    <div class="card-body">
        <form action="{{ route('members.store') }}" method="post" autocomplete="off">
            @csrf
            @include('members._form')
            <br>
            <button type="submit" class='btn btn-success'>Save member</button>
            <a href="{{ route('members.index') }}" class='btn btn-primary'>Cancel</a>
        </form>
    </div>
</div>
@endsection
