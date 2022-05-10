@extends('app')
@section('content')
<h1>{{ $warranty->job_name }}</h1>
<form action="{{ route('warranties.update', $warranty) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('warranties._form')
    <br>
    <button type="submit">Update work</button>
    <a href="{{ route('warranties.show', $warranty) }}">Back</a>
</form>
@endsection
