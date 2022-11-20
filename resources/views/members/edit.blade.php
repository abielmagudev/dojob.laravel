@extends('app')
@section('content')
<x-heading>
    <x-slot name='surtitle'>Member</x-slot>
    {{ $member->fullname }}
</x-heading>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-information-tab" data-bs-toggle="pill" data-bs-target="#pills-information" type="button" role="tab" aria-controls="pills-information" aria-selected="true">Information</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-skills-tab" data-bs-toggle="pill" data-bs-target="#pills-skills" type="button" role="tab" aria-controls="pills-skills" aria-selected="false">Skills</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-access-tab" data-bs-toggle="pill" data-bs-target="#pills-access" type="button" role="tab" aria-controls="pills-access" aria-selected="false">Access</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <!-- Information -->
    <div class="tab-pane fade show active" id="pills-information" role="tabpanel" aria-labelledby="pills-information-tab" tabindex="0">
        <div class="card">
            <div class='card-header'>
                <span class='text-uppercase'>Edit information</span>
            </div>
            <div class="card-body">
                <form action="{{ route('members.update', $member) }}" method="post">
                    @csrf
                    @method('patch')
                    @include('members._form-information')
                    <br>
                    <button type="submit" class='btn btn-warning'>Update member</button>
                    <a href="{{ route('members.index') }}" class='btn btn-primary'>Back</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Skills -->
    <div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab" tabindex="0">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <span class='text-uppercase'>Edit skills</span>
                    <div>@include('skills.modal-manage')</div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method='post'>
                    @include('members._form-skills')
                    <br>
                    <button class="btn btn-success">Update skills</button>
                    <a href="#!" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Access -->
    <div class="tab-pane fade" id="pills-access" role="tabpanel" aria-labelledby="pills-access-tab" tabindex="0">
        <div class="card">
            <div class="card-header">
                <span class='text-uppercase'>Edit access</span>
            </div>
            <div class="card-body">
                <form action="" method='post'>
                    @include('members._form-access')
                    <br>
                    <button class="btn btn-success">Save access</button>
                    <a href="" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<x-modal id='modalDelete' header='Delete member'>
    <x-slot name='trigger' class='link-danger' align='end'>Delete member</x-slot>
    <div class="text-center">
        <p class='lead m-0'>{{ $member->fullname }}</p>
        <p>This member will not be available for future jobs, <br>the jobs they have already done will be kept.</p>
        <p class="text-muted">Are you sure you want to remove the member?</p>
    </div>
    <x-slot name='footer' close='Cancel'>
        <form action="{{ route('members.destroy', $member) }}" method="post" class='d-inline-block'>
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-outline-danger'>Yes, delete member</button>
        </form>
    </x-slot>
</x-modal>
@endsection
