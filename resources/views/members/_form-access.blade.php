<div class='mb-3'>
    <label for="selectType" class='form-label'>Role</label>
    <select name="type" id="selectType" class='form-select'>
        <option label="" disabled selected></option>
        @foreach($roles as $rol)
        <option value="{{ $rol }}">{{ ucfirst($rol) }}</option>   
        @endforeach
    </select>
</div>
