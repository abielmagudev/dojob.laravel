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
                <tbody>
                    @foreach($crews->load('members') as $crew)
                    <tr>
                        <td style="border-left:0.5rem solid <?= $crew->hasColor() ? $crew->color : 'black' ?>">{{ $crew->name }}</td>
                        <td>
                            @foreach($crew->members as $member)
                            <span>{{ $member->fullname }}</span>,
                            @endforeach
                        </td>
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
