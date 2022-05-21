@extends('app')
@section('content')
<a href="{{ route('skills.index') }}">Index</a>
<h1>{{ $skill->name }}</h1>
<p>{{ $skill->description ?? 'No description' }}</p>
<p>
    <small>Operators</small>
</p>
<ul>
    @foreach($skill->operators as $operator)
    <li>
        <span>{{ $operator->fullname }}</span>
    </li>
    @endforeach
</ul>
<a href="{{ route('skills.edit',$skill) }}">Edit</a>
@endsection
