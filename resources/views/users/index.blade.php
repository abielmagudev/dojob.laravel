@extends('app')
@section('content')
<x-heading>Users</x-heading>
<p class="text-end">
    <a href="{{ route('users.create') }}" class='btn btn-primary'>New user</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th colspan="2">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->profile->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->profile_type) }}</td>
                        <td>{{ ucfirst($user->role_name) }}</td>
                        <td class='text-end'>
                            <a href="{{ route('users.show', $user) }}" class='btn btn-outline-primary'>Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
