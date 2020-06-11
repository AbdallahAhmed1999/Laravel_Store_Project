<?php

namespace App\Http\Controllers\Admin;

use App\Ability;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RolesController extends Controller
{

    public function index()
    {
        Gate::authorize('show-roles');

        $roles = Role::all();

        return view('Admin.Role.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        Gate::authorize('add-role');

        $abilities = Ability::all();

        return view("Admin.Role.create", [
            'abilities' => $abilities
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add-role');

        $request->validate([
            'name' => 'required|string|unique:roles|min:3',
            'abilities' => 'required|array|not_in:0'
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->abilities()->attach($request->abilities);

        return back()->with([
            'success' => __('notifications.add-role')
        ]);
    }


    public function edit(Role $role)
    {
        Gate::authorize('edit-role');
        if ($role->name != 'admin') {
            return view('Admin.Role.edit', [
                'role' => $role,
                'abilities' => Ability::all()
            ]);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, Role $role)
    {
        Gate::authorize('edit-role');

        if ($role->name != 'admin') {
            $request->validate([
                'name' => [Rule::unique('roles')->ignore($role->id), 'required', 'string', 'min:3'],
                'abilities' => 'required|array|not_in:0'
            ]);

            $role->update([
                'name' => $request->name
            ]);

            $role->abilities()->sync($request->abilities);

            return back()->with([
                'success' => __('notifications.update-role')
            ]);
        } else {
            abort(404);
        }
    }

    public function destroy(Role $role)
    {
        Gate::authorize('delete-role');
        if ($role->name != 'admin') {
            $role->delete();

            return back()->with([
                'success' => __('notifications.delete-role')
            ]);
        } else {
            abort(404);
        }
    }
}
