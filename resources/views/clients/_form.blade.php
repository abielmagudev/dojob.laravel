<div class='mb-3'>
    <label for="inputName" class='form-label'>Full name</label>
    <input id="inputName" class='form-control mb-2' type="text" name="name" value="{{ old('name', $client->name) }}" placeholder='Name' required>
    <input id="inputLastname" class='form-control' type="text" name="lastname" value="{{ old('lastname', $client->lastname) }}" placeholder='Lastname' required>
</div>
<div class='mb-3'>
    <label for="inputAlias" class='form-label'>Alias</label>
    <input id="inputAlias" class='form-control' type="text" name="alias" value="{{ old('alias', $client->alias) }}" placeholder='Optional'>
    <small class="form-text">Example: "Company name"</small>
</div>
<div class='mb-3'>
    <label for="inputAddress" class='form-label'>Address</label>
    <input id="inputAddress" class='form-control mb-2' type="text" name="address" value="{{ old('address', $client->address) }}" placeholder='Street' required>
    <input id="inputZipcode" class='form-control' type="text" name="zip_code" value="{{ old('zip_code', $client->zip_code) }}" placeholder='Zip Code' required>
</div>
<div class='mb-3'>
    <label for="inputCity" class='form-label'>Location</label>
    <input id="inputCity" class='form-control mb-2' type="text" name="city" value="{{ old('city', $client->city) }}" placeholder='City' required>
    <input id="inputState" class='form-control mb-2' type="text" name="state" value="{{ old('state', $client->state) }}" placeholder='State' required>
    <input id="inputCountry" class='form-control' type="text" name="country"  value="{{ old('country', $client->country) }}" placeholder='Country' required>
</div>
<div class='mb-3'>
    <label for="inputPhone" class='form-label'>Contact</label>
    <div class="mb-2">
        <input id="inputPhone" class='form-control' type="text" name="phone" value="{{ old('phone', $client->phone) }}" placeholder="Phone" required>
        <small class="form-text">Separate by commas</small>
    </div>
    <div>
        <input id="inputEmail" class='form-control' type="text" name="email" value="{{ old('email', $client->email) }}" placeholder="Email (Optional)">
        <small class="form-text">Separate by commas</small>
    </div>
</div>
<div class='mb-3'>
    <label for="textNotes" class='form-label'>Notes</label>
    <textarea id="textNotes" class='form-control' name="notes" cols="30" rows="3" placeholder="Optional">{{ $client->notes }}</textarea>
</div>
