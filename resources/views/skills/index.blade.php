@extends('app')
@section('content')
<a href="{{ route('skills.create') }}">Create</a>
<h1>Skills</h1>
<ul>
    @foreach($skills as $skill)
    <li>
        <span>{{ $skill->name }}</span>
        <a href="{{ route('skills.show', $skill) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
