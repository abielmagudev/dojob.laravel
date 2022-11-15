@extends('app')
@section('content')
<x-heading>
    {{ $crew->name }}
    <span style='color:<?= $crew->hasColor() ? $crew->color : 'black' ?>'>&bull;</span>    
</x-heading>

@if( $crew->hasDescription() ) 
<p class="text-muted">{{ $crew->description }}</p>
<br>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('crews.edit', $crew) }}" class='btn btn-warning'>Edit crew</a>
    
    @if( $crew->isEnabled() )
    <x-modal id='modalManageMembers' header='Manage members' scrollable='true'>
        <x-slot name='trigger' class='btn btn-primary ms-1'>Manage members</x-slot>
        <form action="{{ route('crews.members.update', $crew) }}" method="post" id='formManageMembers'>
            @csrf
            @method('put')
            @foreach($members as $member)
            <?php $checkbox_id = "checkbox{$member->id}" ?>
            <div class="form-check mb-1">
                <input class="form-check-input" type="checkbox" name="members[]" value="{{ $member->id }}" id="{{ $checkbox_id }}" {{ $member->crew_id == $crew->id ? 'checked' : '' }}>
                <label class="form-check-label ms-1" for="{{ $checkbox_id }}">{{ $member->fullname }}</label>
            </div>
            @endforeach
        </form>
        <x-slot name='footer' close='Cancel'>
            <button class="btn btn-success" type='submit' form='formManageMembers'>Update members</button>
        </x-slot>
    </x-modal>
    @endif

</div>

@if( $crew->isEnabled() )
<div class="card">
    <div class="card-header">
        <span>Members</span>
        <span class='badge bg-primary'>{{ $crew->members->count() }}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-none">
                <thead>
                    <tr>
                        <th>Full name</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>        
                    @foreach($crew->members as $member)
                    <tr>
                        <td>{{ $member->fullname }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->email }}</td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@else
<br>
<p class="h1 text-muted text-center">Disabled</p>

@endif
@endsection
