@extends('app')
@section('content')
<x-heading>Skills</x-heading>
<p class="text-end">
    <a href="{{ route('skills.create') }}" class='btn btn-primary'>New skill</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-none">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th colspan="2">Members</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                    <tr>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->members_count }}</td>
                        <td class='text-end'>
                            <a href="{{ route('skills.show', $skill) }}" class='btn btn-outline-primary'>Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
