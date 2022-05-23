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
<br>
@if( $operator->isReal() )
<div>
    <label>Skills</label>
    @foreach($skills as $skill)
    <?php $checkbox_id = "skill{$skill->id}" ?>
    <div>
        <input type="checkbox" name="skills[]" value="{{ $skill->id }}" id="{{ $checkbox_id }}" {{ $operator->hasSkill($skill) ? 'checked' : '' }}>
        <label for="{{ $checkbox_id }}">{{ $skill->name }}</label>
    </div>
    @endforeach
</div>
<br>
@if( $operator->isAvailable() )
<div>
    <label for="selectCrew">Crew</label>
    <select name="crew" id="selectCrew">
        <option label="" selected></option>
        @foreach($crews as $crew)
        <option value="{{ $crew->id }}" {{ $crew->id <> $operator->crew_id ?: 'selected' }}>{{ $crew->name }}</option>
        @endforeach
    </select>
</div>
<br>
@endif
<div>
    <input type="checkbox" name="available" value="yes" id="checkboxAvailable" {{ $operator->isAvailable() ? 'checked' : '' }}>
    <label for="checkboxAvailable">Available</label>
    <br>
    <small>If you uncheck "Available", the operator will not appear in operators list to create a work and will be removed of any crew.</small>
</div>
<br>
@endif
