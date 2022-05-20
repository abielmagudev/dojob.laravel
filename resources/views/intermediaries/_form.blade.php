<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $intermediary->name) }}" placeholder="Example: Company Name">
</div>
<div>
    <label for="inputAlias">Alias</label>
    <input type="text" name="alias" id="inputAlias" value="{{ old('alias', $intermediary->alias) }}" placeholder="Enter manually or let automatically">
</div>
<div>
    <label for="inputContact">Contact</label>
    <input type="text" name="contact" id="inputContact" value="{{ old('contact', $intermediary->contact) }}" placeholder="Optional">
</div>
<div>
    <label for="inputPhone">Phone</label>
    <input type="tel" name="phone" id="inputPhone" value="{{ old('phone', $intermediary->phone) }}">
</div>
<div>
    <label for="inputEmail">Email</label>
    <input type="email" name="email" id="inputEmail" value="{{ old('email', $intermediary->email) }}">
</div>
<div>
    <label for="textareaNotes">Notes</label>
    <textarea name="notes" id="textareaNotes" cols="30" rows="10" placeholder="Optional">{{ $intermediary->notes }}</textarea>
</div>
<br>
@if( $intermediary->isReal() )
<div>
    <input type="checkbox" name="available" value="yes" id="checkboxAvailable" {{ $intermediary->isAvailable() ? 'checked' : '' }}>
    <label for="checkboxAvailable">Available</label>
    <br>
    <small>If you uncheck "Available", the intermediary will not appear in intermediaries list to create a work.</small>
</div>
@endif
