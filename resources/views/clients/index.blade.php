@extends('app')
@section('content')
<x-heading>Clients</x-heading>
<p class="text-end">
    <a href="{{ route('clients.create') }}" class='btn btn-primary'>New client</a>
</p>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-none">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Works</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>
                            <div>{{ $client->fullname }}</div>
                            @if( $client->hasAlias() )
                            <div>({{ $client->alias }})</div>
                            @endif
                        </td>
                        <td>
                            <div>{{ $client->address }}, {{ $client->zip_code }}</div>
                            <div>{{ $client->location }}</div>
                        </td>
                        <td>
                            <div>{{ $client->phone }}</div>
                            <div>{{ $client->email }}</div>
                        </td>
                        <td>{{ $client->works_count }}</td>
                        <td class="text-end">
                            <a href="{{ route('clients.show', $client) }}" class='btn btn-outline-primary'>Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
