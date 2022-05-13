@isset($client)  
<input type="hidden" name="client" value="{{ $client->id }}">
@endisset

@isset($jobs)
<div>
    <label for="selectJob">Job</label>
    <select name="job" id="selectJob">
        <option disabled selected></option>
        <optgroup label="Application">
            @foreach($jobs->where('custom', false) as $job)
            <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ?: 'selected' }}>{{ $job->name }}</option>
            @endforeach
        </optgroup>
        <optgroup label="New">
            @foreach($jobs->where('custom', true)->sortBy('name') as $job)
            <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ?: 'selected' }}>{{ $job->name }}</option>
            @endforeach
        </optgroup>
    </select>
</div>
@endisset

@isset($client)
<div style="display: none;">
    <label for="selectWork">Work</label>
    <select name="work" id="selectWork">
        <option disabled selected></option>
        @foreach($client->works->load('job')->sortByDesc('scheduled_date') as $worked)
        <option value="{{ $worked->id }}" {{ old('work', $work->id) <> $worked->id ?: 'selected' }}>{{ $worked->scheduled_date }} - {{ $worked->job->name }}</option>
        @endforeach
    </select>
</div>
@endisset
<br>

<div>
    <input type="radio" name="assign" value="crew" id="radioCrew" {{ $work->hasCrew() ||! $work->isReal() ? 'checked' : '' }}>
    <label for="radioCrew">Crew</label>
    <input type="radio" name="assign" value="operator" id="radioOperator" {{ $work->isReal() &&! $work->hasCrew() ? 'checked' : '' }}>
    <label for="radioOperator">Operator</label>
</div>
<br>
<div id="elementCrew">
    <label for="selectCrew">Crew</label>
    <select name="crew" id="selectCrew">
        <option label="- No crew -" selected></option>
        @foreach($crews as $crew)
        <option value="{{ $crew->id }}" {{ old('crew', $work->crew_id) == $crew->id ? 'selected' : '' }}>{{ $crew->name }}</option>
        @endforeach
    </select>
</div>
<div id="elementOperator">
    <label for="selectOperator">Operator</label>
    <select name="operator" id="selectOperator">
        <option label="- No operator -" selected></option>
        @foreach($operators as $operator)
        <option value="{{ $operator->id }}" {{ $work->hasOperator($operator) ? 'selected' : '' }}>{{ $operator->fullname }}</option>
        @endforeach
    </select>
</div>
<br>

<div>
    <label for="inputScheduledDate">Scheduled</label>
    <input type="date" name="scheduled_date" value="{{ old('scheduled_date', $work->scheduled_date) }}" id="inputScheduledDate">
    <input type="time" name="scheduled_time" value="{{ old('scheduled_time', $work->scheduled_time) }}" id="inputScheduledTime">
</div>

@if( $work->isReal() )
<div>
    <label for="inputStartedDate">Started</label>
    <input type="date" name="started_date" value="{{ old('started_date', $work->started_date) }}" id="inputStartedDate">
    <input type="time" name="started_time" value="{{ old('started_time', $work->started_time) }}" id="inputStartedTime">
</div>
<div>
    <label for="inputFinishedDate">Finished</label>
    <input type="date" name="finished_date" value="{{ old('finished_date', $work->finished_date) }}" id="inputFinishedDate">
    <input type="time" name="finished_time" value="{{ old('finished_time', $work->finished_time) }}" id="inputfinishedTime">
</div>
<div>
    <label for="inputClosedDate">Closed</label>
    <input type="date" name="closed_date" value="{{ old('closed_date', $work->closed_date) }}" id="inputClosedDate">
    <input type="time" name="closed_time" value="{{ old('closed_time', $work->closed_time) }}" id="inputClosedTime">
</div>
<br>
<div>
    <label for="selectStatus">Status</label>
    <select name="status" id="selectStatus">
        <option disabled selected></option>
        @foreach($work::allStatus() as $status)
        <option value="{{$status}}" {{ $status <> $work->status ?: 'selected' }}>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
</div>
@endif

@push('scripts')
<script>
const inputAssign = {
    elements: document.getElementsByName('assign'),
    selectors: [
        document.getElementById('selectCrew'),
        document.getElementById('selectOperator')
    ],
    displaying: function (value) {
        this.selectors.forEach( function (selector) {
            selector.disabled = selector.name !== value
            selector.parentElement.style.display = selector.name !== value ? 'none' : 'block'
        })
    },
    listening: function () {
        let self = this

        self.elements.forEach( function(input) {
            input.addEventListener('change', function (e) {
                self.displaying(e.target.value)
            })
        })
    }
}

<?php $assign_initial = $work->isUnreal() ? '"crew"' : ($work->hasCrew() ? '"crew"' : '"operator"'); ?>
inputAssign.displaying(<?= $assign_initial ?>)
inputAssign.listening()
</script>  
@endpush
