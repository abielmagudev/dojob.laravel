@extends('app')
@section('content')
<x-heading>Members</x-heading>
<p class='text-end'>
    <a href="{{ route('members.create') }}" class='btn btn-primary'>New member</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class='table table-hover align-middle shadow-none'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members->sortBy('email') as $member)
                    <tr>
                        <td>{{ $member->fullname }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->email }}</td>
                        <td class="text-end">
                            <a href="{{ route('members.edit', $member) }}" class='btn btn-outline-warning'>Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
