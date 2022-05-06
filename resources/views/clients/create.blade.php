@extends('app')
@section('content')
<form action="{{ route('clients.store') }}" method="post">
    @csrf
    @include('clients._form')
    <br>
    <button type="submit">Save client</button>
    <a href="{{ route('clients.index') }}">Cancel</a>
</form>
@endsection
