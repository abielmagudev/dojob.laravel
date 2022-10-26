@extends('app')
@section('content')
<x-heading>Members</x-heading>
<div class="card">
    <div class='card-header'>
        <span class='text-uppercase'>Edit member</span>
    </div>
    <div class="card-body">
        <form action="{{ route('members.update', $member) }}" method="post">
            @csrf
            @method('patch')
            @include('members._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update member</button>
            <a href="{{ route('members.index') }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
<br>
<x-modal id='modalDelete'>
    <x-slot name='button' class='link-danger' align='end'>Delete member</x-slot>
    <x-slot name='title'>Delete member</x-slot>
    <form action="{{ route('members.destroy', $member) }}" method="post" id='formMemberDelete'>
        @csrf
        @method('delete')
        <div class="text-center">
            <p class='lead'>{{ $member->fullname }}</p>
            <p>This member will not be available for future jobs, <br>the jobs they have already done will be kept.</p>
            <p class="text-muted">Are you sure you want to remove the member?</p>
        </div>
    </form>
    <x-slot name='footer' close='Cancel'>
        <button type="submit" form='formMemberDelete' class='btn btn-outline-danger'>Yes, delete member</button>
    </x-slot>
</x-modal>
@endsection
