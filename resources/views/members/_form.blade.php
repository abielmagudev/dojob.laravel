<div class='mb-3'>
    <label for="selectType" class='form-label'>Type</label>
    <select name="type" id="selectType" class='form-select'>
        <option label="" disabled selected></option>
        @foreach($roles as $rol)
        <option value="{{ $rol }}">{{ ucfirst($rol) }}</option>   
        @endforeach
    </select>
</div>
<div class='mb-3'>
    <label for="inputName" class='form-label'>Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $member->name) }}" class='form-control' required>
</div>
<div class='mb-3'>
    <label for="inputLastname" class='form-label'>Lastname</label>
    <input type="text" name="lastname" id="inputLastname" value="{{ old('lastname', $member->lastname) }}" class='form-control' required>
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
    <textarea name="notes" id="textNotes" cols="30" rows="5" class='form-control' placeholder="Optional">{{ old('notes', $member->notes) }}</textarea>
</div>
@includeWhen($member->isReal(), 'members._form-skills')
@includeWhen($member->isReal(), 'members._form-available')
