@if( $work->isReal() )
<div class='mb-3'>
    <label for="selectStatus" class='form-label'>Status</label>
    <select name="status" id="selectStatus" class='form-select'>
        @foreach($work::allStatus() as $status)
        <option value="{{$status}}" {{ $status <> $work->status ?: 'selected' }}>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
</div>
<br>
@endif

<p class="lead">Participants</p>
<div class="mb-3">
    <label for="selectAssign" class="form-label">Assign</label>
    <div class="mb-3">
        <select name="assign" id="selectAssign" class="form-select">
            @foreach($work::assignments() as $assignment) 
            <option value="{{ $assignment }}" data-select-id='select{{ ucfirst($assignment) }}' {{ $work->assigned === $assignment ? 'selected' : '' }}>{{ ucfirst($assignment) }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <select name="crew" id="selectCrew" class="form-select {{ $work->assigned != 'crew' ? 'd-none' : '' }}" {{ $work->assigned == 'crew' ? 'required' : 'disabled' }}>
            <option disabled selected label='Select a crew...'></option>
            @foreach($crews as $crew)
            <option value="{{ $crew->id }}" {{ old('crew', $work->crew_id) == $crew->id ? 'selected' : '' }}>{{ $crew->name }}</option>
            <?php if( old('crew', $work->crew_id) == $crew->id ) $selected_crew = true ?>
            @endforeach

            @if( $work->hasAssignedCrew() &&! isset($selected_crew) )
            <option label="{{ $work->crew->name }} (Unavailable)" selected></option>
            @endif
        </select>

        <select name="member" id="selectMember" class="form-select {{ $work->assigned != 'member' ? 'd-none' : '' }}" {{ $work->assigned == 'member' ? 'required' : 'disabled' }}>
            <option disabled selected label="Select a member..."></option>
            @foreach($members as $member)
            <option value="{{ $member->id }}" {{ $work->inMembers($member) &&! $work->hasAssignedCrew() ? 'selected' : '' }}>{{ $member->fullname }}</option>
            @endforeach

            @if( $work->hasAssignedMember() && $work->member()->isUnavailable() )
            <option label="{{ $work->member()->fullname }} (Unavailable)" selected></option>
            @endif
        </select>
    </div>
</div>
<div class='mb-3'>
    <label for="selectIntermediary" class='form-label'>Intermediary</label>
    <select name="intermediary" id="selectIntermediary" class='form-select'>
        <option selected>None intermediary</option>
        @foreach($intermediaries as $intermediary)
        <option value="{{ $intermediary->id }}" {{ $intermediary->id == $work->intermediary_id ? 'selected' : '' }}>{{ $intermediary->name }} - {{ $intermediary->alias }}</option>
        @endforeach

        @if( $work->hasIntermediary() &&! $work->intermediary->isAvailable() )
        <option value="{{ $work->intermediary_id }}" selected>{{ $work->intermediary->name }} - {{ $work->intermediary->alias }} (Unavailable)</option>
        @endif
    </select>
</div>
<br>

<p class="lead">Timeline</p>
<div class='mb-3'>
    <label for="inputScheduledDate" class='form-label'>Scheduled</label>
    <div class="row">
        <div class="col-sm">  
            <input type="date" name="scheduled_date" value="{{ old('scheduled_date', $work->scheduled_date) }}" id="inputScheduledDate" class='form-control'>
        </div>
        <div class="col-sm">
            <input type="time" name="scheduled_time" value="{{ old('scheduled_time', $work->scheduled_time) }}" id="inputScheduledTime" class='form-control'>
        </div>
    </div>
</div>

@if( $work->isReal() )
<div class='mb-3'>
    <label for="inputStartedDate" class='form-label'>Started</label>
    <div class="row">
        <div class="col-sm">
            <input type="date" name="started_date" value="{{ old('started_date', $work->started_date) }}" id="inputStartedDate" class='form-control'>
        </div>
        <div class="col-sm">
            <input type="time" name="started_time" value="{{ old('started_time', $work->started_time) }}" id="inputStartedTime" class='form-control'>
        </div>
    </div>
</div>
<div class='mb-3'>
    <label for="inputFinishedDate" class='form-label'>Finished</label>
    <div class="row">
        <div class="col-sm">
            <input type="date" name="finished_date" value="{{ old('finished_date', $work->finished_date) }}" id="inputFinishedDate" class='form-control'>
        </div>
        <div class="col-sm">
            <input type="time" name="finished_time" value="{{ old('finished_time', $work->finished_time) }}" id="inputfinishedTime" class='form-control'>
        </div>
    </div>
</div>
<div class='mb-3'> 
    <label for="inputClosedDate" class='form-label'>Closed</label>
    <div class="row">
        <div class="col-sm">
            <input type="date" name="closed_date" value="{{ old('closed_date', $work->closed_date) }}" id="inputClosedDate" class='form-control'>
        </div>
        <div class="col-sm">
            <input type="time" name="closed_time" value="{{ old('closed_time', $work->closed_time) }}" id="inputClosedTime" class='form-control'>
        </div>
    </div>
</div>
@endif
<br>

<p class="lead">Perform</p>
@if( isset($jobs) )
<div class='mb-3'>
    <label for="selectJob" class='form-label'>Job</label>
    <select name="job" id="selectJob" class='form-select'>
        <option disabled selected label='Select a job...'></option>
        @foreach($jobs as $job)
        <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ?: 'selected' }}>{{ $job->name }}</option>
        @endforeach
    </select>
</div>

@else
<div class="mb-3">
    <label class="form-label">Job</label>
    <div class="form-control bg-light">{{ $work->job->name }}</div>
</div>

@endif

<div class="mb-3">
    <label for="textareaNotes" class="form-label">Notes</label>
    <textarea name="notes" id="textareaNotes" cols="30" rows="3" class="form-control"></textarea>
</div>

@once
@push('scripts')
<script>

const selectAssign = {
    element: document.getElementById('selectAssign'),
    listen: function (selectors) {
        this.element.addEventListener('change', function (e) { 
            let selectorId = e.target.selectedOptions[0].dataset.selectId;

            selectors.forEach( function (selector) {
                let element = document.getElementById(selector);

                element.disabled = true
                element.classList.add('d-none')

                if( element.id == selectorId )
                {
                    element.disabled = false
                    element.selectedIndex = 0
                    element.classList.remove('d-none')
                }
            })
        })
    }
}
selectAssign.listen([
    'selectCrew', 
    'selectMember'
])

const selectJob = {
    element: document.getElementById('selectJob'),
    route: '<?= url('job_plugin/job_id/form') ?>',
    listen: function () {
        let self = this;

        this.element.addEventListener('change', function (e) {
            console.log(self.route.replace('job_id', e.target.value))
            fetch( self.route.replace('job_id', e.target.value) )
            .then((response) => response.json())
            .then((data) => console.log(data));
        })
    }
}
selectJob.listen()

</script>  
@endpush
@endonce
