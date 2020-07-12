<?php

namespace App\Http\Controllers;

use App\Navigation;
use Spatie\Permission\Models\Permission;

class NavigationController extends Controller
{
    public function table()
    {
        $navigations = Navigation::whereNotNull('url')->get();
        return view('navigation.table', compact('navigations'));
    }

    public function create()
    {
        $submit = "Create";
        $navigation = new Navigation;
        $navigations = Navigation::where('url', null)->get();
        $permissions = Permission::get();
        return view('navigation.create', compact('navigations', 'permissions', 'navigation', 'submit'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'permission_name' => 'required',
        ]);

        Navigation::create([
            'name' => request('name'),
            'url' => request('url') ?? null,
            'permission_name' => request('permission_name'),
            'parent_id' => request('parent_id') ?? null,
        ]);

        return redirect()->route('navigation.table')->with('success', "Navigation has been created!");
    }

    public function edit(Navigation $navigation)
    {
        $submit = "Update";
        $navigations = Navigation::where('url', null)->get();
        $permissions = Permission::get();
        return view('navigation.edit', compact('navigation','navigations', 'permissions', 'submit'));
    }

    public function update(Navigation $navigation)
    {
        request()->validate([
            'name' => 'required',
            'permission_name' => 'required',
        ]);

        $navigation->update([
            'name' => request('name'),
            'url' => request('url') ?? null,
            'permission_name' => request('permission_name'),
            'parent_id' => request('parent_id') ?? null,
        ]);
        return redirect()->route('navigation.table')->with('success', "{$navigation->name} has been updated!");
    }

    public function destroy(Navigation $navigation)
    {
        $navigation->delete();
        return redirect()->route('navigation.table')->with('success', "{$navigation->name} has been deleted!");
    }
}
