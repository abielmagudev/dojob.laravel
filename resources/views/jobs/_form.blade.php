<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $job->name) }}" required>
</div>
<div>
    <label for="textDescription">Description</label>
    <textarea name="description" id="textDescription" cols="30" rows="10" placeholder="Optional">{{ old('description', $job->description) }}</textarea>
</div>
@if( $job->isReal() )
<br>
<div>
    <input type="checkbox" name="enabled" id="checkboxEnabled" value='yes' {{ $job->isEnabled() ? 'checked' : '' }}>
    <label for="checkboxEnabled">Enabled</label>
    <br>
    <small>If you uncheck "Enabled", the job will not appear in jobs list to create a work.</small>
</div>    
@endif
