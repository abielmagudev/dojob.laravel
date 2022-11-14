@extends('app')
@section('content')
<x-heading>{{ $warranty->work->job_name }}</x-heading>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Edit warranty</span>
    </div>
    <div class="card-body">
        <form action="{{ route('warranties.update', $warranty) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            @include('warranties._form')
            <br>
            <button type="submit" class='btn btn-warning'>Update warranty</button>
            <a href="{{ route('works.show', $warranty->work_id) }}" class='btn btn-primary'>Back</a>
        </form>
    </div>
</div>
@endsection
