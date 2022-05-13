@extends('app')
@section('content')
<p>
    <small>Client information</small>
</p>
<ul>
    <li><b>{{ $work->client->fullname }}</b></li>
    <li>{{ $work->client->address }}, {{ $work->client->zip_code }}</li>
    <li>{{ $work->client->location }}</li>
    <li>{{ $work->client->phone }}</li>
    <li>{{ $work->client->email }}</li>
</ul>
<hr>
<h2>{{ $work->job_name }}</h2>
<form action="{{ route('works.update', $work) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('works._form')
    <br>
    <button type="submit">Update work</button>
    <a href="{{ route('works.show', $work) }}">Back</a>
</form>
@endsection
