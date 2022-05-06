<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $crew->name) }}" required>
</div>
<div>
    <label for="textDescription">Description</label>
    <textarea name="description" id="textDescription" cols="30" rows="10" placeholder="Optional">{{ $crew->description }}</textarea>
</div>
<div>
    <label for="inputColor">Color</label>
    <input type="color" name="color" id="inputColor" value="{{ old('color', $crew->color) }}" placeholder="Optional">
</div>
