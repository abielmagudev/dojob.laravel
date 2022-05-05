<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $client->name) }}" required>
</div>
<div>
    <label for="inputLastname">Lastname</label>
    <input type="text" name="lastname" id="inputLastname" value="{{ old('lastname', $client->lastname) }}" required>
</div>
<div>
    <label for="inputAlias">Alias <small>(Example: company name)</small></label>
    <input type="text" name="alias" id="inputAlias" value="{{ old('alias', $client->alias) }}" placeholder="Optional">
</div>
<div>
    <label for="inputAddress">Address</label>
    <input type="text" name="address" id="inputAddress" value="{{ old('address', $client->address) }}" required>
</div>
<div>
    <label for="inputZipcode">Zip code</label>
    <input type="text" name="zip_code" id="inputZipcode" value="{{ old('zip_code', $client->zip_code) }}" required>
</div>
<div>
    <label for="inputCity">City</label>
    <input type="text" name="city" id="inputCity" value="{{ old('city', $client->city) }}" required>
</div>
<div>
    <label for="inputState">State</label>
    <input type="text" name="state" id="inputState" value="{{ old('state', $client->state) }}" required>
</div>
<div>
    <label for="inputCountry">Country</label>
    <input type="text" name="country" id="inputCountry" value="{{ old('country', $client->country) }}" required>
</div>
<div>
    <label for="inputPhone">Phone</label>
    <input type="text" name="phone" id="inputPhone" value="{{ old('phone', $client->phone) }}" required>
</div>
<div>
    <label for="inputEmail">Email</label>
    <input type="text" name="email" id="inputEmail" value="{{ old('email', $client->email) }}" placeholder="Optional">
</div>
<div>
    <label for="textNotes">Notes</label>
    <textarea name="notes" id="textNotes" cols="30" rows="10" placeholder="Optional">{{ $client->notes }}</textarea>
</div>