<div>
    <label for="inputExpires">Expires</label>
    <input type="date" name="expires" id="inputExpires" value="{{ old('expires', $warranty->expires) }}">
</div>
@if( isset($work) )
<input type="hidden" name="work" value="{{ $work->id }}">
@endif
