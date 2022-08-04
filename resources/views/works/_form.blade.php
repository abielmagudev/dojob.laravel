@isset($client)  
<input type="hidden" name="client" value="{{ $client->id }}">
@endisset

<div>
    <label for="selectIntermediary">Intermediary</label>
    <select name="intermediary" id="selectIntermediary">
        <option disabled selected></option>
        @foreach($intermediaries as $intermediary)
        <option value="{{ $intermediary->id }}" {{ $intermediary->id == $work->intermediary_id ? 'selected' : '' }}>{{ $intermediary->name }} ({{ $intermediary->alias }})</option>
        @endforeach

        @if( $work->hasIntermediary() &&! $work->intermediary->isAvailable() )
        <option label="{{ $work->intermediary->name }} ({{ $work->intermediary->alias }}) (Unavailable)" selected></option>
        @endif
    </select>
</div>
<br>

@isset($jobs)
<div>
    <label for="selectJob">Job</label>
    <select name="job" id="selectJob">
        <option disabled selected></option>
        <optgroup label="Application">
            @foreach($non_custom_jobs as $job)
            <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ?: 'selected' }}>{{ $job->name }}</option>
            @endforeach
        </optgroup>
        <optgroup label="New">
            @foreach($jobs as $job)
            <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ?: 'selected' }}>{{ $job->name }}</option>
            @endforeach
        </optgroup>
    </select>
</div>
@endisset

@isset($client)
<div style="display:none">
    <label for="selectWork">Work</label>
    <select name="work" id="selectWork">
        <option disabled selected></option>
        @foreach($client->works->load('job')->sortByDesc('scheduled_date') as $worked)
        <option value="{{ $worked->id }}" {{ old('work', $work->id) <> $worked->id ?: 'selected' }}>{{ $worked->scheduled_date }} - {{ $worked->job->name }}</option>
        @endforeach
    </select>
</div>
<br>
@endisset

<div>
    <div>
        <input type="radio" name="assign" value="crew" id="radioCrew" {{ $work->hasCrew() ||! $work->isReal() ? 'checked' : '' }}>
        <label for="radioCrew">Crew</label>
        <input type="radio" name="assign" value="member" id="radioMember" {{ $work->isReal() &&! $work->hasCrew() ? 'checked' : '' }}>
        <label for="radioMember">Member</label>
    </div>
    <br>
    <div id="elementCrew">
        <label for="selectCrew">Crew</label>
        <select name="crew" id="selectCrew" {{ $work->isUnreal() ? 'required' : '' }}>
            <option disabled selected></option>
            @foreach($crews as $crew)
            <option value="{{ $crew->id }}" {{ old('crew', $work->crew_id) == $crew->id ? 'selected' : '' }}>{{ $crew->name }}</option>
            <?php if( old('crew', $work->crew_id) == $crew->id ) $selected_crew = true  ?>
            @endforeach

            @if( $work->hasCrew() &&! isset($selected_crew) )
            <option label="{{ $work->crew->name }} (Unavailable)" selected></option>
            @endif
        </select>
    </div>
    <div id="elementMember">
        <label for="selectMember">Member</label>
        <select name="member" id="selectMember" {{ $work->isUnreal() ? 'required' : '' }}>
            <option label="" disabled selected></option>
            @foreach($members as $member)
            <option value="{{ $member->id }}" {{ $work->hasMember($member) &&! $work->hasCrew() ? 'selected' : '' }}>{{ $member->fullname }}</option>
            @endforeach

            @if( $work->hasSingleMemberAssigned() && $work->singleMember()->isUnavailable() )
            <option label="{{ $work->singleMember()->fullname }} (Unavailable)" selected></option>
            @endif
        </select>
    </div>
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

@once
@push('scripts')
<script>
const inputAssign = {
    elements: document.getElementsByName('assign'),
    selectors: [
        document.getElementById('selectCrew'),
        document.getElementById('selectMember')
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

<?php $assign_initial = $work->isUnreal() ? '"crew"' : ($work->hasCrew() ? '"crew"' : '"member"'); ?>
inputAssign.displaying(<?= $assign_initial ?>)
inputAssign.listening()
</script>  
@endpush
@endonce
