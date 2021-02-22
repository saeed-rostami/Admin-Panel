<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('Admin.Admins.Roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('Admin.Admins.Roles.singleRole', compact('role' , 'permissions'));
    }

    public function store(Request $request)
    {
        $role = $request->role;
        Role::create(['name' => $role]);
        return redirect('roles');
    }

    public function edit(Role $role)
    {
        return view('Admin.Admins.Roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
        ]);
        $role->update();
        return redirect('roles');

    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
