<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $role = new Role;
        return view('permissions.roles.index', compact('roles', 'role'));   
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);
        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name'),
        ]);
        return back();
    }

    public function edit(Role $role)
    {
        return view('permissions.roles.edit', [
            'role' => $role, 
            'submit' => 'Update'
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name'),
        ]);
        return redirect()->route('roles.index');
    }
}
