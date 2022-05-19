<div>
    <label for="inputTitle">Title</label>
    <input type="text" name="title" id="inputTile" value="{{ old('title', $warranty->title) }}">
</div>
<div>
    <label for="textareaNotes">Notes</label>
    <textarea name="notes" id="textareaNotes" cols="30" rows="10" placeholder="Optional">{{ old('notes', $warranty->notes) }}</textarea>
</div>
<div>
    <label for="inputExpires">Expires</label>
    <input type="date" name="expires" id="inputExpires" value="{{ old('expires', $warranty->expires) }}">
</div>
@if( isset($work) )
<input type="hidden" name="work" value="{{ $work->id }}">
@endif
