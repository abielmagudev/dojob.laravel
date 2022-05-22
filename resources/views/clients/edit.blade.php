@extends('app')
@section('content')
<form action="{{ route('clients.update', $client) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('clients._form')
    <br>
    <button type="submit">Update client</button>
    <a href="{{ route('clients.show', $client) }}">Back</a>
</form>
<hr>
<form action="{{ route('clients.destroy', $client) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete client</button>
</form>
@endsection
