@extends('app')
@section('content')
<x-heading>Users</x-heading>
<p class="lead">
    <span>{{ $user->profile->fullname }}</span>
    <small class="text-muted d-block">{{ ucfirst($user->role_name) }}</small>
</p>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit user</span>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user) }}" method="post">
            @csrf
            @method('patch')
            @include('users._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update user</button>
            <a href="{{ route('users.show', $user) }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeleteUser' title='Delete user'>
    <x-slot name='trigger' align='end' class='link-danger'>Delete user</x-slot>
    <div class="text-center">
        <p class="lead mb-0">{{ $user->profile->fullname }}</p>
        <p class='text-capitalize'>{{ $user->role_name }}</p>
        <p class="text-muted">Are you sure you want to remove the user?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('users.destroy',$user) }}" method="post" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Yes, delete user</button>
        </form>
    </x-slot>
</x-modal>

@endsection
