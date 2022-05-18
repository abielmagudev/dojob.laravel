@extends('app')
@section('content')
<h1>Warranties ({{ $warranties->count() }})</h1>
<ul>
    @foreach($warranties as $warranty)
    <li>
        <span>{{ $warranty->expires }} - {{ $warranty->work->job_name }}</span>
    </li>
    @endforeach
</ul>
@endsection
