<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" id="inputName" value="{{ old('name', $member->name) }}" required>
</div>
<div>
    <label for="inputLastname">Lastname</label>
    <input type="text" name="lastname" id="inputLastname" value="{{ old('lastname', $member->lastname) }}" required>
</div>
<div>
    <label for="inputBirthdate">Date of birth</label>
    <input type="text" name="birthdate" id="inputBirthdate" value="{{ old('birthdate', $member->birthdate) }}" placeholder="Optional" onfocus="(this.type = 'date')" onblur="(this.type = 'text')">
</div>
<div>
    <label for="inputPhone">Phone</label>
    <input type="text" name="phone" id="inputPhone" value="{{ old('phone', $member->phone) }}" required>
</div>
<div>
    <label for="inputEmail">Email</label>
    <input type="email" name="email" id="inputEmail" value="{{ old('email', $member->email) }}" required>
</div>
<div>
    <label for="textNotes">Notes</label>
    <textarea name="notes" id="textNotes" cols="30" rows="10" placeholder="Optional">{{ old('notes', $member->notes) }}</textarea>
</div>
<div>
    <label for="selectType">Type</label>
    <select name="type" id="">
        <option label="" disabled selected></option>
        @foreach($roles as $rol)
        <option value="{{ $rol }}">{{ ucfirst($rol) }}</option>   
        @endforeach
    </select>
</div>
<br>
@if( $member->isReal() )
<div>
    <label>Skills</label>
    @foreach($skills as $skill)
    <?php $checkbox_id = "skill{$skill->id}" ?>
    <div>
        <input type="checkbox" name="skills[]" value="{{ $skill->id }}" id="{{ $checkbox_id }}" {{ $member->hasSkill($skill) ? 'checked' : '' }}>
        <label for="{{ $checkbox_id }}">{{ $skill->name }}</label>
    </div>
    @endforeach
</div>
<br>
@if( $member->isAvailable() )
<div>
    <label for="selectCrew">Crew</label>
    <select name="crew" id="selectCrew">
        <option label="" selected></option>
        @foreach($crews as $crew)
        <option value="{{ $crew->id }}" {{ $crew->id <> $member->crew_id ?: 'selected' }}>{{ $crew->name }}</option>
        @endforeach
    </select>
</div>
<br>
@endif
<div>
    <input type="checkbox" name="available" value="yes" id="checkboxAvailable" {{ $member->isAvailable() ? 'checked' : '' }}>
    <label for="checkboxAvailable">Available</label>
    <br>
    <small>If you uncheck "Available", the member will not appear in staff list to create a work and will be removed of any crew.</small>
</div>
<br>
@endif
