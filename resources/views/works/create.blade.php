@extends('app')
@section('content')
<p>
    <a href="{{ route('works.index') }}">Index</a>
</p>
<p>
    <small>Client information</small>
</p>
<ul>
    <li><b>{{ $client->fullname }}</b></li>
    <li>{{ $client->address }}, {{ $client->zip_code }}</li>
    <li>{{ $client->location }}</li>
    <li>{{ $client->phone }}</li>
    <li>{{ $client->email }}</li>
</ul>
<hr>
<br>
<form action="{{ route('works.store') }}" method="post" autocomplete="off">
    @csrf
    @include('works._form')
    <br>
    <button type="submit">Create work</button>
    <a href="{{ route('works.index') }}">Cancel</a>
</form>
@endsection
