@extends('app')
@section('content')
<a href="{{ route('members.create') }}">Create</a>
<h1>Members ({{ $members->count() }})</h1>
<table>
    <tbody>
        @foreach($members->sortBy('email') as $member)
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
