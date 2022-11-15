@extends('app')
@section('content')
<x-heading>Crews</x-heading>
<p class="text-end">
    <a href="{{ route('crews.create') }}" class='btn btn-primary'>New crew</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-none">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Members</th>
                        <th>Works</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crews->load('members') as $crew)
                    <tr>
                        <td>
                            <b style='border-radius:1rem;border:0.5rem solid <?= $crew->colored ?>'></b>
                        </td>
                        <td class='text-nowrap'>
                            <span class='ms-1'>{{ $crew->name }}</span>
                        </td>
                        <td>
                            {{ $crew->members->implode('fullname', ',') }}
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
