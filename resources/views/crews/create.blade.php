@extends('app')
@section('content')
<form action="{{ route('crews.store') }}" method="post">
    @csrf
    @include('crews._form')
    <br>
    <button type="submit">Save crew</button>
    <a href="{{ route('crews.index') }}">Cancel</a>
</form>
@endsection
