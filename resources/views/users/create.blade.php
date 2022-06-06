@extends('app')
@section('content')
<form action="{{ route('users.store') }}" method="post" autocomplete="off">
    @csrf
    @include('users._form')
    <br>
    <button type="submit">Create user</button>
    <a href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection
