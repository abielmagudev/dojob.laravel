@extends('app')
@section('content')
<form action="{{ route('intermediaries.store') }}" method="post" autocomplete="off">
    @csrf
    @include('intermediaries._form')
    <br>
    <button type="submit">Create intermediary</button>
    <a href="{{ route('intermediaries.index') }}">Cancel</a>
</form> 
@endsection
