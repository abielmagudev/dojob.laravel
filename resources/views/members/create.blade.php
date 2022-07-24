@extends('app')
@section('content')
<form action="{{ route('members.store') }}" method="post" autocomplete="off">
    @csrf
    @include('members._form')
    <br>
    <button type="submit">Create member</button>
    <a href="{{ route('members.index') }}">Cancel</a>
</form>
@endsection
