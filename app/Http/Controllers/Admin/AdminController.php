<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();

        if ($request->role === 'All' or $request->role == null) {
            $users = User::all();
        } else {
            $role = Role::query()->find($request->role);
            $name = $role->name;
            $users = User::role($name)->get();
        }

        return view('Admin.Admins.index', compact('users', 'roles'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('Admin.singleAdmin', compact('user', 'roles'));
    }

    public function roleUser(Request $request, User $user)
    {
        $role = $request->role;
        $user->assignRole($role);
        return redirect('admins');
    }

    public function removeRoleUser(User $user)
    {
        $user->roles()->detach();
        return redirect('admins');
    }

}
