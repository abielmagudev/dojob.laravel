@extends('app')
@section('content')
<form action="{{ route('members.update', $member) }}" method="post">
    @csrf
    @method('patch')
    @include('members._form')
    <br>
    <button type="submit">Update member</button>
    <a href="{{ route('members.index') }}">Back</a>
</form>
<hr>
<form action="{{ route('members.destroy', $member) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete member</button>
</form>
@endsection
