@extends('app')
@section('content')
<h1>{{ $crew->name }}</h1>
<form action="{{ route('crews.operators.update', $crew) }}" method="post">
    @csrf
    @method('put')
    <ul>
        @foreach($operators as $operator)
        <?php $checkbox_id = "checkbox{$operator->id}" ?>
        <li>
            <input type="checkbox" name="operators[]" value="{{ $operator->id }}" id="{{ $checkbox_id }}" {{ $operator->crew_id <> $crew->id ?: 'checked' }}>
            <label for="{{ $checkbox_id }}">{{ $operator->fullname }}</label>
        </li>
        @endforeach
    </ul>
    <br>
    <button type="submit">Set operators</button>
    <a href="{{ route('crews.show', $crew) }}">Back</a>
</form>
@endsection
