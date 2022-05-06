@extends('app')
@section('content')
<a href="{{ route('crews.index') }}">Index</a>
<h1>{{ $crew->name }}</h1>
<a href="{{ route('crews.edit', $crew) }}">Edit</a>
<ul>
    <li>
        <small>Description</small>
        <span>{{ $crew->description }}</span>
    </li>
    <li>
        <small>Color</small>
        <span>{{ $crew->color }}</span>
        <span style="color:<?= $crew->color ?>">&diams;</span>
    </li>
    <li>
        <small>Available</small>
        <span>{{ $crew->isAvailable() ? 'Yes' : 'No' }}</span>
    </li>
</ul>
@endsection
