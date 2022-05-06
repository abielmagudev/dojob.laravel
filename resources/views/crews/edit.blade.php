@extends('app')
@section('content')
<form action="{{ route('crews.update', $crew) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('crews._form')
    <div>
        <input type="checkbox" name="disabled" value="0" id="checkboxDisabled" {{ $crew->isEnabled() ?: 'checked' }}>
        <label for="checkboxDisabled">Disabled</label>
    </div>
    <br>
    <button type="submit">Update crew</button>
    <a href="{{ route('crews.show', $crew) }}">Back</a>
</form>
@endsection
