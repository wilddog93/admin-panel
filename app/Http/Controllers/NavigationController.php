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
        $navigations = Navigation::where('url', null)->get();
        $permissions = Permission::get();
        return view('navigation.create', compact('navigations', 'permissions'));
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

        return back();
    }
}
