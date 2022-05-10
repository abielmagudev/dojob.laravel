@extends('app')
@section('content')
<a href="{{ route('warranties.index') }}">Index</a>
<h1>{{ $warranty->job_name }}</h1>
<ul>
    <li>Expires {{ $warranty->expires }}</li>
</ul>
<a href="{{ route('warranties.edit', $warranty) }}">Edit</a>
<form action="{{ route('warranties.destroy', $warranty) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
@endsection
