<div class='mb-3'>
    <label for="inputName" class='form-label'>Name</label>
    <input id="inputName" class='form-control' type="text" name="name" value="{{ old('name', $intermediary->name) }}" placeholder="Example: Company Name">
</div>
<div class='mb-3'>
    <label for="inputAlias" class='form-label'>Alias</label>
    <input id="inputAlias" class='form-control' type="text" name="alias" value="{{ old('alias', $intermediary->alias) }}" placeholder="Enter manually or let automatically">
</div>
<div class='mb-3'>
    <label for="inputContact" class='form-label'>Contact</label>
    <input id="inputContact" class='form-control' type="text" name="contact" value="{{ old('contact', $intermediary->contact) }}" placeholder="Optional">
</div>
<div class='mb-3'>
    <label for="inputPhone" class='form-label'>Phone</label>
    <input id="inputPhone" class='form-control' type="tel" name="phone" value="{{ old('phone', $intermediary->phone) }}">
</div>
<div class='mb-3'>
    <label for="inputEmail" class='form-label'>Email</label>
    <input id="inputEmail" class='form-control' type="email" name="email" value="{{ old('email', $intermediary->email) }}">
</div>
<div class='mb-3'>
    <label for="textareaNotes" class='form-label'>Notes</label>
    <textarea id="textareaNotes" class='form-control' name="notes" cols="30" rows="3" placeholder="Optional">{{ $intermediary->notes }}</textarea>
</div>
@if( $intermediary->isReal() )
<label for="checkboxAvailable" class="form-label">Available</label>
<div class="border rounded p-3 mb-3">
    <div class='form-check form-switch'>
        <input id="checkboxAvailable" class="form-check-input"  type="checkbox" name="available" value="yes" {{ $intermediary->isAvailable() ? 'checked' : '' }}>
        <label for="checkboxAvailable" class="form-check-label">If you disable it, the intermediary will not appear in the list of intermediaries to create a work.</label>
    </div>
</div>
@endif
