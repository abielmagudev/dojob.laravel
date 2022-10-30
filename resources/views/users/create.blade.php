@extends('app')
@section('content')
<x-heading>Users</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New user</span>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="post" autocomplete="off">
            @csrf
            @include('users._form')
            <br>
            <button type="submit" class='btn btn-success'>Save user</button>
            <a href="{{ route('users.index') }}" class='btn btn-primary'>Cancel</a>
        </form>
    </div>
</div>
@endsection
