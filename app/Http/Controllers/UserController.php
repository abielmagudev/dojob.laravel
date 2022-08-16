<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // whereDoesntHave('role name')
        return view('users.index')->with('users', User::with('profilable','roles')->orderBy('id','desc')->get());
    }

    public function create()
    {
        return view('users.create')->with('user', new User);
    }

    public function store(UserStoreRequest $request)
    {
        if(! $user = User::create($request->validated()) )
            return back()->with('danger', 'Oops! user no created');

        return redirect()->route('users.index')->with('success', "{$user->profile->fullname} user created");
    }

    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if(! $user->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! user no updated');

        return redirect()->route('users.edit', $user)->with('success', "{$user->profile->name} user updated");
    }

    public function destroy(User $user)
    {
        if(! $user->delete() )
            return back()->with('danger', 'Oops! user no deleted');

        return redirect()->route('users.index')->with('success', "{$user->profile->name} user deleted");
    }
}
