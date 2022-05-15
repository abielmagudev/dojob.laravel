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
<hr>
<form action="{{ route('crews.destroy',$crew) }}" method="post" autocomplete="off" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete crew</button>
</form>
@endsection
