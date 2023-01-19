@extends('app')
@section('content')
<x-heading>Works</x-heading>
<p>
    <span class="lead">{{ $client->fullname }}</span>
    <span class="d-block">{{ $client->residence }}, {{ $client->location }}</span>
    <span class="d-block">{{ $client->contact }}</span>
</p>

<div class="card">
    <div class="card-header">
        <span class="text-uppercase">New work</span>
    </div>
    <div class="card-body">
        <form action="{{ route('works.store') }}" method="post" autocomplete="off">
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
            <br>

            <p class="lead">Perform</p>
            <div class='mb-3'>
                <label for="selectJob" class='form-label'>Job</label>
                <select name="job" id="selectJob" class='form-select'>
                    <option disabled selected label='Select a job...'></option>
                    @foreach($jobs as $job)
                    <option value="{{ $job->id }}" {{ old('job', $work->job_id) <> $job->id ? '' : 'selected' }}>{{ $job->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="plugins" class='bg-light bg-gradient mb-3'></div>

            <div class="mb-3">
                <label for="textareaNotes" class="form-label">Notes</label>
                <textarea name="notes" id="textareaNotes" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <br>

            <button type="submit" class='btn btn-success' name='client' value='{{ $client->id }}'>Save work</button>
            <a href="{{ route('works.index') }}" class='btn btn-primary'>Cancel</a>
            @csrf
        </form>
    </div>
</div>
<br>

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
</script>

<script>
const selectJob = {
    element: document.getElementById('selectJob'),
    plugins: document.getElementById('plugins'),
    route: '<?= route('pluginloader.demo') ?>',
    listen: function () {
        let self = this;

        this.element.addEventListener('change', function (e) {
            self.plugins.innerHTML = ""
            let url = self.route.replace('job_id', e.target.value) + '/create'; 

            fetch(url)
            .then((response) => response.json())
            .then((json) => {
                // console.info(json)
                
                json.map(function (view) {
                    let div = document.createElement('div');
                    div.classList.add('mb-3');
                    div.innerHTML = view;
                    self.plugins.append(div);
                    /*
                    if( script = document.getElementById(view.api_plugin.hashed+'_script') )
                    {
                        let code = script.text;
                        script.remove()

                        let element = document.createElement('script');
                        element.text = code;
                        self.container.append(element);
                    }
                    */
                })

                console.log(self.plugins.getElementsByTagName('script'))
                
                for(el of self.plugins.getElementsByTagName('script'))
                {
                    console.info(el)
                    eval(el.innerHTML)
                }

                
            })
            .catch( function(failure) {
                console.log(failure)
            })
        })
    }
}
selectJob.listen()
</script>  
@endpush
@endonce
@endsection
