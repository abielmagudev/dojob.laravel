@extends('app')
@section('content')
<x-heading>Intermediaries</x-heading>
<p class="text-end">
    <a href="{{ route('intermediaries.create') }}" class='btn btn-primary'>New intermediary</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th colspan='2'>Alias</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($intermediaries as $intermediary)
                <tr>
                    <td>{{ $intermediary->name }}</td>
                    <td>{{ $intermediary->alias }}</td>
                    <td class='text-end'>
                        <a href="{{ route('intermediaries.show', $intermediary) }}" class='btn btn-outline-primary'>Show</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</div>
@endsection
