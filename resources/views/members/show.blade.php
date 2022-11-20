@extends('app')
@section('content')
<x-heading>
    <x-slot name='surtitle'>Member</x-slot>
    {{ $member->fullname }}
    <x-slot name='subtitle'>{{ $member->to_contact }}</x-slot>
</x-heading>
<div class="mb-3">
    <x-modal id='modal' header='Manage skills'>
        <x-slot name='trigger' class='btn btn-primary' align='end'>Manage skills</x-slot>
    </x-modal>
</div>
<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-header">
                <span>Works</span>
                <span class='badge bg-primary'>{{ $member->works->count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-header">
                <div class="float-end">
                </div>
                <span>Skills</span>
            </div>
        </div>
    </div>
</div>
@endsection
