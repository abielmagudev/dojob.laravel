@extends('app')
@section('content')
<x-heading>
    {{ $intermediary->nameWithAlias }}
    <x-slot name='subtitle'>{{ $intermediary->contact }}</x-slot>
</x-heading>
<p class="text-muted">
    <span class='d-block mb-3'>{{ $intermediary->phone }} | {{ $intermediary->email }}</span>
    @if( $intermediary->hasNotes() )
    <em class='d-block'>{{ $intermediary->notes }}</em>
    @endif
</p>
<p class="text-end">
    <a href="{{ route('intermediaries.edit', $intermediary) }}" class='btn btn-warning'>Edit intermediary</a>
</p>
@if( $intermediary->isAvailable() )   
<p class="text-center">Show jobs and counters of this intermediary</p>
@else
<p class="h1 text-muted text-center">Unavailable</p>

@endif
@endsection
