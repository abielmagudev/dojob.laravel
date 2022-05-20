@extends('app')
@section('content')
<form action="{{ route('intermediaries.update', $intermediary) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('intermediaries._form')
    <br>
    <button type="submit">Update intermediary</button>
    <a href="{{ route('intermediaries.show', $intermediary) }}">Back</a>
</form> 
<hr>
<form action="{{ route('intermediaries.destroy', $intermediary) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete intermediary</button>
</form>
@endsection
