<div class="row mb-3">
    <div class='col-10'>
        <label for="inputName" class='form-label'>Name</label>
        <input id="inputName" class='form-control' type="text" name="name" value="{{ old('name', $crew->name) }}" required>
    </div>
    <div class='col'>
        <label for="inputColor" class='form-label'>Color</label>
        <input id="inputColor" class='form-control form-control-color w-100' type="color" name="color" value="{{ old('color', $crew->color) }}" placeholder="Optional">
    </div>
</div>
<div class='mb-3'>
    <label for="textDescription" class='form-label'>Description</label>
    <textarea id="textDescription" class='form-control' name="description" cols="30" rows="3" placeholder="Optional">{{ $crew->description }}</textarea>
</div>
@if( $crew->id )
<label for="checkboxDisabled" class='form-label'>Enabled</label>
<div class="border rounded p-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" ame="enabled" value="yes" id="checkboxDisabled" {{ $crew->isDisabled() ?: 'checked' }}>
        <label class="form-check-label" for="checkboxDisabled">If you uncheck, the crew will not appear in crews list to create a work and will remove all its operators.</label>
    </div>
</div>
@endif
