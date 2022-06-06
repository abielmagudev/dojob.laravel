<div>
    <label for="inputName">Name</label>
    <input type="text" name="name" value="{{ old('name', $user->name) }}" id="inputName" required>
</div>
<div>
    <label for="inputEmail">Email</label>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" id="inputEmail" required>
</div>
<div>
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword" {{ $user->id ? '' : 'required' }}>
</div>
<div>
    <label for="inputConfirmPassword">Confirm password</label>
    <input type="password" name="password_confirmation" id="inputConfirmPassword" {{ $user->id ? '' : 'required' }}>
</div>
