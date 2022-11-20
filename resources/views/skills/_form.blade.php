<div class='mb-3'>
    <label for="inputName" class='form-label'>Name</label>
    <input id="inputName" class='form-control' type="text" name="name" value="{{ old('name', $skill->name) }}" autofocus required>
</div>
<div class='mb-3'>
    <label for="textareaDescription" class='form-label'>Description</label>
    <textarea id="textareaDescription" class='form-control' name="description" cols="40" rows="4" placeholder="Optional">{{ old('description', $skill->description) }}</textarea>
</div>
