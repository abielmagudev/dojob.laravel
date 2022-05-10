@extends('app')
@section('content')
<a href="{{ route('warranties.create', mt_rand(1,500)) }}">Create</a>
<h1>Warranties ({{ $warranties->count() }})</h1>
<ul>
    @foreach($warranties as $warranty)
    <li>
        <span>{{ $warranty->expires }} - {{ $warranty->job_name }}</span>
        <a href="{{ route('warranties.show', $warranty) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection
