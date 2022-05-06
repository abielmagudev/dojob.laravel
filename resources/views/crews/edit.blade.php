@extends('app')
@section('content')
<form action="{{ route('crews.update', $crew) }}" method="post">
    @csrf
    @method('put')
    @include('crews._form')
    <div>
        <input type="checkbox" name="unavailable" value="0" id="checkboxDisabled" {{ $crew->isAvailable() ?: 'checked' }}>
        <label for="checkboxDisabled">Unavailable</label>
    </div>
    <br>
    <button type="submit">Update crew</button>
    <a href="{{ route('crews.show', $crew) }}">Back</a>
</form>
@endsection
