<div class='mb-3'>
    <label for="inputName" class='form-label'>Full name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $member->name) }}" class='form-control mb-3' placeholder='Name' required>
    <input type="text" name="lastname" id="inputLastname" value="{{ old('lastname', $member->lastname) }}" class='form-control' placeholder='Lastname' required>
</div>
<div class='mb-3'>
    <label for="inputPhone" class='form-label'>Phone</label>
    <input type="text" name="phone" id="inputPhone" value="{{ old('phone', $member->phone) }}" class='form-control' equired>
</div>
<div class='mb-3'>
    <label for="inputEmail" class='form-label'>Email</label>
    <input type="email" name="email" id="inputEmail" value="{{ old('email', $member->email) }}" class='form-control' required>
</div>
<div class='mb-3'>
    <label for="inputBirthdate" class='form-label'>Date of birth</label>
    <input type="text" name="birthdate" id="inputBirthdate" value="{{ old('birthdate', $member->birthdate) }}" class='form-control' placeholder="Optional" onfocus="(this.type = 'date')" onblur="(this.type = 'text')">
</div>
<div class='mb-3'>
    <label for="textNotes" class='form-label'>Notes</label>
    <textarea name="notes" id="textNotes" cols="30" rows="3" class='form-control' placeholder="Optional">{{ old('notes', $member->notes) }}</textarea>
</div>
@if( $member->isReal() )    
<div class='mb-3'>
    <label class='form-label'>Available</label>
    <div class="border rounded p-3">
        <div class='form-check form-switch'>
            <input type="checkbox" id="checkboxAvailable" name="available" value="yes" class='form-check-input' {{ $member->isAvailable() ? 'checked' : '' }}>
            <label for="checkboxAvailable" class='form-check-label'>This member can be used to belong to a crew or assign a job.</label>
        </div>
    </div>
</div>
@endif
