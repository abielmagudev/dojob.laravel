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
@endsection
