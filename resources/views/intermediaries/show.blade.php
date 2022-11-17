@extends('app')
@section('content')
<x-heading>{{ $intermediary->nameWithAlias }}</x-heading>
<p class="text-muted">
    <span class='lead'>{{ $intermediary->contact }}</span><br>
    @if( $intermediary->hasNotes() )
    <em>{{ $intermediary->notes }}</em><br>
    @endif
    <span>{{ $intermediary->contact_means }}</span>
</p>
<p class="text-end">
    <a href="{{ route('intermediaries.edit', $intermediary) }}" class='btn btn-warning'>Edit intermediary</a>
</p>
<div class="card">
    <div class="card-header">
        <span class="text-uppercase">Works</span>
        <span class="badge bg-primary">{{ $intermediary->loadCount('works')->works_count }}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover shadow-none align-middle">
                <thead>
                    <tr>
                        <th></th>
                        <th>Total</th>
                        @foreach($all_status as $status)
                        <th>{{ ucfirst($status) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($works->sortKeys() as $job => $counters)                   
                    <tr>
                        <td>
                            <span>{{ $job }}</span>
                        </td>
                        <td class='text-center'>
                            <span class="badge bg-primary">{{ $counters['total'] }}</span>
                        </td>
                        @foreach($all_status as $status)
                        <td class="text-center {{ $counters[$status] ? 'bg-success bg-opacity-10' : '' }}">{{ $counters[$status] }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
</div>
@endsection
