@extends('app')
@section('content')
<a href="{{ route('crews.index') }}">Index</a>
<h1>{{ $crew->name }}</h1>
<ul>
    <li>
        <small>Color</small>
        <span>{{ $crew->color }}</span>
        <span style="font-size:1.25rem; color:<?= $crew->hasColor() ? $crew->color : 'black' ?>">&diams;</span>
    </li>
    <li>
        <small>Description</small>
        <span>{{ $crew->description }}</span>
    </li>
    <li>
        <small>Enabled</small>
        <span>{{ $crew->isEnabled() ? 'Yes' : 'No' }}</span>
    </li>
    <li>
        <small>Operators ({{$crew->operators->count()}})</small>
        <ul>
            @foreach($crew->operators as $operator)
            <li>
                <span>{{ $operator->fullname }}</span>
                <a href="{{ route('operators.show', $operator) }}">Show</a>
            </li>  
            @endforeach
        </ul>
    </li>
</ul>
@if( $crew->isEnabled() )
<a href="{{ route('crews.operators', $crew) }}">Manage operators</a>
@endif
<br>
<br>
<a href="{{ route('crews.edit', $crew) }}">Edit</a>
<form action="{{ route('crews.destroy',$crew) }}" method="post" autocomplete="off" style="display:inline">
    @csrf
    @method('delete')
    <button type="submit">Delete crew</button>
</form>
@endsection
