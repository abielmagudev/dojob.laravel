@extends('app')
@section('content')
<x-heading>Crews</x-heading>
<p class="text-end">
    <a href="{{ route('crews.create') }}" class='btn btn-primary'>New crew</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Members</th>
                        <th colspan="2">Works</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crews->load('members') as $crew)
                    <tr>
                        <td class='text-nowrap'>
                            <b style='font-size:1.5rem;color:<?= $crew->colored ?>'>&bull;</b>
                            <span class='ms-1'>{{ $crew->name }}</span>
                        </td>
                        <td>
                            @foreach($crew->members as $member)
                            <span>{{ $member->fullname }}</span>,
                            @endforeach
                        </td>
                        <td>{{ $crew->works_count }}</td>
                        <td class='text-end'>
                            <a href="{{ route('crews.show', $crew) }}" class='btn btn-outline-primary'>Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
