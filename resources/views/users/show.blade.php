@extends('app')
@section('content')
<x-heading>
    {{ $user->profile->fullname }}
    <x-slot name='subtitle'>
        <span class="text-capitalize">{{ $user->role_name }}</span>
    </x-slot>
</x-heading>
<p class="text-muted">
    <span>{{ $user->email }}</span>
    <span>|</span>
    <span>{{ $user->updated_at }}</span>
</p>
<p class="text-end">
    <a href="{{ route('users.edit', $user) }}" class='btn btn-warning'>Edit user</a>
</p>
@endsection
