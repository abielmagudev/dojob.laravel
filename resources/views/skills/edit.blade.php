@extends('app')
@section('content')
<x-heading>Skills</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit skill</span>
    </div>
    <div class="card-body">
        <form action="{{ route('skills.update', $route_parameters) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            @include('skills._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update skill</button>
            <a href="{{ $back_url }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDeleteSkill' header='Delete skill'>
    <x-slot name='trigger' align='end' class='link-danger'>Delete skill</x-slot>
    <div class="text-center">
        <p class="lead mb-0">{{ $skill->name }}</p>
        <p>Members {{ $skill->members_count }}</p>
        <p class="text-muted">Are you sure you want to remove the skill?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('skills.destroy', $route_parameters) }}" method="post" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Yes, delete skill</button>
        </form>
    </x-slot>
</x-modal>
@endsection
