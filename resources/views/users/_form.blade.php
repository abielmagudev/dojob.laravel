<div class='mb-3'>
    <label for="inputEmail" class='form-label'>Email</label>
    <input id="inputEmail" class='form-control' type="email" name="email" value="{{ old('email', $user->email) }}"  required>
</div>
<div class='mb-3'>
    <label for="inputPassword" class='form-label'>Password</label>
    <input id="inputPassword" class='form-control' type="password" name="password" {{ $user->id ? '' : 'required' }}>
</div>
<div class='mb-3'>
    <label for="inputConfirmPassword" class='form-label'>Confirm password</label>
    <input id="inputConfirmPassword" class='form-control' type="password" name="password_confirmation" {{ $user->id ? '' : 'required' }}>
</div>
