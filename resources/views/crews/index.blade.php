@extends('app')
@section('content')
<h1>Crew ({{ $crews->count() }})</h1>
<a href="{{ route('crews.create') }}">Create</a>
<ul>
    @foreach($crews as $crew)
    <li style="color:<?= ! $crew->hasColor() ?: $crew->color ?>">
        <span style="color:black">{{ $crew->name }}</span>
        <a href="{{ route('crews.show', $crew) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
