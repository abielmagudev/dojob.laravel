@extends('app')
@section('content')
<form action="{{ route('operators.update', $operator) }}" method="post">
    @csrf
    @method('put')
    @include('operators._form')
    <br>
    <button type="submit">Update operator</button>
    <a href="{{ route('operators.show', $operator) }}">Back</a>
</form>
@endsection
