@extends('app')
@section('content')
<form action="{{ route('operators.update', $operator) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('operators._form')
    <br>
    <button type="submit">Update operator</button>
    <a href="{{ route('operators.show', $operator) }}">Back</a>
</form>
<hr>
<form action="{{ route('operators.destroy', $operator) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete operator</button>
</form>
@endsection
