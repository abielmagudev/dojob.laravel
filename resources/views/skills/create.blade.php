@extends('app')
@section('content')
<p>
    <a href="{{ route('skills.index') }}">Index</a>
</p>
<form action="{{ route('skills.store') }}" method="post" autocomplete="off">
    @csrf
    @include('skills._form')
    <br>
    <button type="submit">Create skill</button>
    <a href="{{ route('skills.index') }}">Cancel</a>
</form>
@endsection
