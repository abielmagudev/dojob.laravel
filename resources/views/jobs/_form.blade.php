<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $job->name) }}" required>
</div>
<div>
    <label for="textDescription">Description</label>
    <textarea name="description" id="textDescription" cols="30" rows="10">{{ old('description', $job->description) }}</textarea>
</div>
