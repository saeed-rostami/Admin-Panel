<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('Admin.Admins.Permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $permission = $request->permission;
        Permission::create(['name' => $permission]);
        return redirect('permissions');
    }

    public function edit(Permission $permission)
    {
        return view('Admin.Admins.Permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->name,
        ]);
        $permission->update();
        return redirect('permissions');
    }


    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }

    public function permissionsRole(Request $request, Role $role)
    {
        $permissions = $request->permisssion;
        $role->syncPermissions($permissions);
        return redirect('roles');

    }
}
