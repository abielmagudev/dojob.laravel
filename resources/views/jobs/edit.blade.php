@extends('app')
@section('content')
<form action="{{ route('jobs.update', $job) }}" method="post" autocomplete="off">
    @csrf
    @method('put')
    @include('jobs._form')
    <div>
        <input type="checkbox" name="disabled" id="checkboxDisabled" value='0' {{ $job->isEnabled() ?: 'checked' }}>
        <label for="checkboxDisabled">Disabled</label>
    </div>
    <br>
    <button type="submit">Update job</button>
    <a href="{{ route('jobs.show', $job) }}">Back</a>
</form>
@endsection
