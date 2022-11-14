<div class='mb-3'>
    <label for="inputName" class='form-label'>Name</label>
    <input class='form-control' type="text" name="name" id="inputName" value="{{ old('name', $warranty->name) }}" placeholder='Example: Maintenance' required>
</div>
<div class='mb-3'>
    <label for="textareaDescription" class='form-label'>Description</label>
    <textarea class='form-control' name="description" id="textareaDescription" cols="30" rows="3" placeholder="Optional">{{ old('description', $warranty->description) }}</textarea>
</div>
<div class='mb-3'>
    <label for="inputExpires" class='form-label'>Expires</label>
    <input class='form-control' type="date" name="expires" id="inputExpires" value="{{ old('expires', $warranty->expires) }}">
</div>
@isset($work)
<input type="hidden" name="work" value="{{ $work->id }}">
@endisset
