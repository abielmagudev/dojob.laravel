@extends('app')
@section('content')
<form action="{{ route('users.update', $user) }}" method="post">
    @csrf
    @method('patch')
    @include('users._form')
    <br>
    <button type="submit">Update user</button>
    <a href="{{ route('users.show', $user) }}">Back</a>
</form>
<hr>
<form action="{{ route('users.destroy',$user) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete user</button>
</form>
@endsection
