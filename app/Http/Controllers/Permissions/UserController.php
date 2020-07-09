<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function create()
    {
        return view('permission.assign.user.create', [
            'roles' => Role::get(),
            'users' => User::get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'email' => 'required',
            'roles' => 'array|required',
        ]);
        $user = User::find(request('email'));
        $user->assignRole(request('roles'));
        return back()->with('success', "The users roles has been assigned");
    }

    public function edit(User $user)
    {
        return view('permission.assign.user.edit', [
            'user' => $user,
            'users' => User::get(),
            'roles' => Role::get(),
        ]);
    }

    public function update(User $user)
    {
        request()->validate([
            'email' => 'required',
            'roles' => 'array|required',
        ]);
        $user->syncRoles(request('roles'));
        return redirect(route('assign.user.create'))->with('success', "The users roles has been synced");
    }
}
