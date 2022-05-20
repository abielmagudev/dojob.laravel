<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $skill->name) }}">
</div>
<div>
    <label for="textareaDescription">Description</label>
    <textarea name="description" id="textareaDescription" cols="30" rows="10" placeholder="Optional">{{ old('description', $skill->description) }}</textarea>
</div>
