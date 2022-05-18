@extends('app')
@section('content')
<h1>{{ $warranty->work->job_name }}</h1>
<form action="{{ route('warranties.update', $warranty) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('warranties._form')
    <br>
    <button type="submit">Update warranty</button>
    <a href="{{ route('works.warranties', $warranty->work_id) }}">Back</a>
</form>
@endsection
