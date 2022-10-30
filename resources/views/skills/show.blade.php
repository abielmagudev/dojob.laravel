@extends('app')
@section('content')
<x-heading>{{ $skill->name }}</x-heading>
<p class='text-muted'>{{ $skill->description ?? 'No description' }}</p>
<p class="text-end">
    <a href="{{ route('skills.edit',$skill) }}" class='btn btn-warning'>Edit skill</a>
</p>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Members</span>
    </div>
    <div class="card-body">
        <table class='table table-hover align-middle shadow-none'>
            <tbody>
                @foreach($skill->members as $member)
                <tr>
                    <td>{{ $member->fullname }}</td>
                    <td class="text-end">
                        <a href="{{ route('members.show', $member) }}" class="btn btn-outline-primary">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
