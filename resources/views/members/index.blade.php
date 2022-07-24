@extends('app')
@section('content')
<a href="{{ route('members.create') }}">Create</a>
<h1>Staff ({{ $staff->count() }})</h1>
<table>
    <tbody>
        @foreach($staff->sortBy('email') as $member)
        <tr>
            <td>{{ $member->fullname }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->email }}</td>
            <td>
                <a href="{{ route('members.edit', $member) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
