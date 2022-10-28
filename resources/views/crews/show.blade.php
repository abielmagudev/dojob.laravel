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

<p class="text-end">
    <a href="{{ route('crews.edit', $crew) }}" class='btn btn-warning'>Edit crew</a>
    @if( $crew->isEnabled() )
    <a href="{{ route('crews.operators.manage', $crew) }}" class='btn btn-primary'>Manage members</a>
    @endif
</p>

@if( $crew->isEnabled() )
<div class="card">
    <div class="card-header">
        <span>Members</span>
        <span class='badge bg-primary'>{{ $crew->members->count() }}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <tbody>        
                    @foreach($crew->members as $operator)
                    <tr>
                        <td>{{ $operator->fullname }}</td>
                        <td class='text-end'>
                            <a href="{{ route('operators.show', $operator) }}" class='btn btn-outline-primary'>Show</a>
                        </td>
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
