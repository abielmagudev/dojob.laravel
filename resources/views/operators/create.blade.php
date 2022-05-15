@extends('app')
@section('content')
<form action="{{ route('operators.store') }}" method="post" autocomplete="off">
    @csrf
    @include('operators._form')
    <br>
    <button type="submit">Create operator</button>
    <a href="{{ route('operators.index') }}">Cancel</a>
</form>
@endsection
