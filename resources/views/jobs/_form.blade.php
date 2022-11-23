<div class='mb-3'>
    <label for="inputName" class='form-label'>Name</label>
    <input id="inputName" class='form-control' type="text" name="name" value="{{ old('name', $job->name) }}" required>
</div>
<div class='mb-3'>
    <label for="textDescription" class='form-label'>Description</label>
    <textarea id="textDescription" class='form-control' name="description" cols="40" rows="4" placeholder="Optional">{{ old('description', $job->description) }}</textarea>
</div>
@if( $job->isReal() )
<div class='mb-3'>
    <label for="checkboxEnabled" class="form-label">Enabled</label>
    <div class="border rounded p-3">
        <div class="form-check form-switch">
            <input id="checkboxEnabled" class="form-check-input" type="checkbox" name="enabled" value='yes' {{ $job->isEnabled() ? 'checked' : '' }}>
            <label for="checkboxEnabled" class="form-check-label">If you disable it, the job will not appear in the job list for creating a job.</label>
        </div>
    </div>
</div>    
@endif
