@extends('app')
@section('content')
<a href="{{ route('skills.index') }}">Index</a>
<h1>{{ $skill->name }}</h1>
<p>{{ $skill->description ?? 'No description' }}</p>
<br>
<a href="{{ route('skills.edit',$skill) }}">Edit</a>
@endsection
