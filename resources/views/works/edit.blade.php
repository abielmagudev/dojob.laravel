@extends('app')
@section('content')
<form action="{{ route('works.update', $work) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    <p>...inputs?</p>
    
    <button type="submit">Update work</button>
    <a href="{{ route('works.show', $work) }}">Back</a>
</form>
@endsection
