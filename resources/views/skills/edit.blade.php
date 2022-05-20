@extends('app')
@section('content')
<p>
    <a href="{{ route('skills.index') }}">Index</a>
</p>
<form action="{{ route('skills.update', $skill) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('skills._form')
    <br>
    <button type="submit">Update skill</button>
    <a href="{{ route('skills.show', $skill) }}">Back</a>
</form>
<hr>
<form action="{{ route('skills.destroy', $skill) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete skill</button>
</form>
@endsection
