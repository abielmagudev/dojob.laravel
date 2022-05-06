@extends('app')
@section('content')
<a href="{{ route('crews.create') }}">Create</a>
<h1>Crews ({{ $crews->count() }})</h1>
<ul>
    @foreach($crews as $crew)
    <li style="color:<?= $crew->hasColor() ? $crew->color : 'black' ?>">
        <span style="color:black">{{ $crew->name }}</span>
        <a href="{{ route('crews.show', $crew) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
