<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $crew->name) }}" required>
</div>
<div>
    <label for="inputColor">Color</label>
    <input type="color" name="color" id="inputColor" value="{{ old('color', $crew->color) }}" placeholder="Optional">
</div>
<div>
    <label for="textDescription">Description</label>
    <textarea name="description" id="textDescription" cols="30" rows="10" placeholder="Optional">{{ $crew->description }}</textarea>
</div>
@if( $crew->id )
<br>
<div>
    <input type="checkbox" name="enabled" value="yes" id="checkboxDisabled" {{ $crew->isDisabled() ?: 'checked' }}>
    <label for="checkboxDisabled">Enabled</label>
    <br>
    <small>If you uncheck "Enabled", the crew will not appear in crews list to create a work and will remove all its operators.</small>
</div>
@endif
