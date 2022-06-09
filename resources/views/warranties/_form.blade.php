<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $warranty->name) }}" placeholder='Example: Maintenance' required>
</div>
<div>
    <label for="textareaDescription">Detailed description</label>
    <textarea name="description" id="textareaDescription" cols="30" rows="10" placeholder="Optional">{{ old('description', $warranty->description) }}</textarea>
</div>
<div>
    <label for="inputExpires">Expires</label>
    <input type="date" name="expires" id="inputExpires" value="{{ old('expires', $warranty->expires) }}">
</div>
@isset($work)
<input type="hidden" name="work" value="{{ $work->id }}">
@endisset
