@extends('app')
@section('content')
<x-heading>
    {{ $intermediary->nameWithAlias }}
    <x-slot name='subtitle'>{{ $intermediary->contact }}</x-slot>
</x-heading>
<p class="text-muted">
    <span class='d-block mb-3'>{{ $intermediary->phone }}; {{ $intermediary->email }}</span>
    @if( $intermediary->hasNotes() )
    <em class='d-block'>{{ $intermediary->notes }}</em>
    @endif
</p>
<p class="text-end">
    <a href="{{ route('intermediaries.edit', $intermediary) }}" class='btn btn-warning'>Edit</a>
</p>
@endsection
