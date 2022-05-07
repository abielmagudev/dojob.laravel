@extends('app')
@section('content')
<form action="{{ route('operators.update', $operator) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('operators._form')
    <div>
        <label for="selectCrew">Crew</label>
        <select name="crew" id="selectCrew">
            <option label="- Uncrewed -" selected></option>
            @foreach($crews as $crew)
            <option value="{{ $crew->id }}" {{ $crew->id <> $operator->crew_id ?: 'selected' }}>{{ $crew->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit">Update operator</button>
    <a href="{{ route('operators.show', $operator) }}">Back</a>
</form>
@endsection
