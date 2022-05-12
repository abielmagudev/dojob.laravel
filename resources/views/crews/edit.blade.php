@extends('app')
@section('content')
<form action="{{ route('crews.update', $crew) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('crews._form')
    <br>
    <button type="submit">Update crew</button>
    <a href="{{ route('crews.show', $crew) }}">Back</a>
</form>
@endsection
