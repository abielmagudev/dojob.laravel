@extends('app')
@section('content')
<x-heading>Works</x-heading>
<p class="lead mb-0">{{ $work->job_name }}</p>
<p><b>{{ ucfirst($work->status) }}</b></p>

<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" role="tab" aria-controls="details-tab-pane" aria-selected="false" href='#!'>Details</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="participants-tab" data-bs-toggle="tab" data-bs-target="#participants-tab-pane" role="tab" aria-controls="participants-tab-pane" aria-selected="true" href='#!'>Participants</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="timeline-tab" data-bs-toggle="tab" data-bs-target="#timeline-tab-pane" role="tab" aria-controls="timeline-tab-pane" aria-selected="false" href='#!'>Timeline</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="warranties-tab" data-bs-toggle="tab" data-bs-target="#warranties-tab-pane" role="tab" aria-controls="warranties-tab-pane" aria-selected="false" href='#!'>Warranties</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="nested-tab" data-bs-toggle="tab" data-bs-target="#nested-tab-pane" role="tab" aria-controls="nested-tab-pane" aria-selected="false" href='#!'>Nested</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <!-- Details -->
            <div class="tab-pane fade show active" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                Details...
            </div>

            <!-- Participants -->
            <div class="tab-pane fade" id="participants-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class='mb-3'>
                    <div class="text-muted text-uppercase small mb-1">Client</div>
                    <div class="lead">{{ $work->client->fullname }}</div>
                    <small class="d-block">{{ $work->client->residence }}</small>
                    <small class="d-block">{{ $work->client->location }}</small>
                </div>

                <div class='mb-3'>
                    <div class="text-muted text-uppercase small mb-1">Intermediary</div>
                    @if( $work->hasIntermediary() )
                    <div class="lead">{{ $work->intermediary->name }}</div>
                    <small class='d-block'>{{ $work->intermediary->contact }}</small>
                    <small class='d-block'>{{ $work->intermediary->phone }}</small>
        
                    @else
                    <div class='lead'>None</div>
        
                    @endif
                </div>
    
                <div class='mb-3'>
                    <div class="text-muted text-uppercase small mb-1">{{ ucfirst($work->assigned) }} assigned</div>
                    @if( $work->hasAssignedCrew() )
                    <div class="lead">{{ $work->crew->name }}</div>
                    <ul>
                        @foreach($work->members as $member)
                        <li>{{ $member->fullname }} ({{ $member->position ?? '?' }})</li>
                        @endforeach
                    </ul>
        
                    @else
                    <div class='lead'>{{ $work->member()->fullname }}</div>
        
                    @endif
                </div>
            </div>
        
            <!-- Timeline -->
            <div class="tab-pane fade" id="timeline-tab-pane" role="tabpanel" aria-labelledby="timeline-tab" tabindex="0">
                <p>Priority <b>{{ $work->priority }}</b></p>
                <ul>
                    <li>
                        <small class="d-block text-uppercase text-muted">Scheduled</small>
                        {{ $work->scheduled_at }}
                    </li>
                    <li>
                        <small class="d-block text-uppercase text-muted">Started</small>
                        {{ $work->started_at ?? '-' }}
                    </li>
                    <li>
                        <small class="d-block text-uppercase text-muted">Finished</small>
                        {{ $work->finished_at ?? '-' }}
                    </li>
                    <li>
                        <small class="d-block text-uppercase text-muted">Closed</small>
                        {{ $work->closed_at ?? '-' }}
                    </li>
                    <li>
                        <small class="d-block text-uppercase text-muted">Created</small>
                        {{ $work->created_at }}
                    </li>
                    <li>
                        <small class="d-block text-uppercase text-muted">Updated</small>
                        {{ $work->updated_at }}
                    </li>
                </ul>
            </div>
        
            <!-- Warranties -->
            <div class="tab-pane fade" id="warranties-tab-pane" role="tabpanel" aria-labelledby="warranties-tab" tabindex="0">
                <p class="text-end">
                     <a href="{{ route('warranties.create',$work) }}" class='btn btn-primary'>New warranty</a>
                </p>
                <div class="table-responsive">
                    <table class='table table-hover align-middle shadow-none'>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Expires</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($work->warranties->sortByDesc('id') as $warranty) 
                            <tr>
                                <td>{{ $warranty->name }}</td>
                                <td>{{ $warranty->description }}</td>
                                <td class='text-nowrap'>{{ $warranty->expires }}</td>
                                <td class='text-nowrap text-end'>
                                    <a href="{{ route('warranties.edit', $warranty) }}" class="btn btn-outline-warning">Edit</a>
                                    <button type="button" data-delete="{{ $warranty->id }}" class='btn btn-outline-danger'>Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Nested -->
            <div class="tab-pane fade" id="nested-tab-pane" role="tabpanel" aria-labelledby="nested-tab" tabindex="0">
                Nested jobs...
            </div>
        </div>
    </div>
</div>

<form action="#!" method="post" id="formWarrantyDelete">
    @csrf
    @method('delete')
</form>


@push('scripts')
<script>
const deleteTriggers = {
    elements: document.querySelectorAll('button[data-delete]'),
    listening: function () {
        this.elements.forEach( function (button) {
            button.addEventListener('click', function () {
                deleteForm.send(this.dataset.delete)
            })
        })
    }
}

const deleteForm = {
    element: document.getElementById('formWarrantyDelete'),
    base_route: "<?= route('warranties.index') ?>",
    send: function (warranty_id) {
        if( isNaN(warranty_id) )
            return false;
            
        this.element.action = this.base_route + '/' + warranty_id
        this.element.submit()
    }
}

deleteTriggers.listening()
</script>
@endpush
@endsection
