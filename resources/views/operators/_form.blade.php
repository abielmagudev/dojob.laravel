<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $operator->name) }}" required>
</div>
<div>
    <label for="inputLastname">Lastname</label>
    <input type="text" name="lastname" id="inputLastname" value="{{ old('lastname', $operator->lastname) }}" required>
</div>
<div>
    <label for="inputPhone">Phone</label>
    <input type="text" name="phone" id="inputPhone" value="{{ old('phone', $operator->phone) }}" required>
</div>
<div>
    <label for="inputEmail">Email</label>
    <input type="email" name="email" id="inputEmail" value="{{ old('email', $operator->email) }}" required>
</div>
<div>
    <label for="inputBirthdate">Date of birth</label>
    <input type="text" name="birthdate" id="inputBirthdate" value="{{ old('birthdate', $operator->birthdate) }}" placeholder="Optional" onfocus="(this.type = 'date')" onblur="(this.type = 'text')">
</div>
<div>
    <label for="textNotes">Notes</label>
    <textarea name="notes" id="textNotes" cols="30" rows="10" placeholder="Optional">{{ old('notes', $operator->notes) }}</textarea>
</div>
