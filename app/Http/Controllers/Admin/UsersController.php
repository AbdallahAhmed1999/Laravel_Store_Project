<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index()
    {
        Gate::authorize('show-users');

        $users = User::paginate(10);
        return view('Admin.Users.index', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {
        Gate::authorize('edit-user-roles');

        return view('Admin.Users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);

    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('edit-user-roles');

        if ($user->id != 1) {
            $request->validate([
                'roles' => 'required|array|not_in:0'
            ]);

            $user->roles()->sync($request->roles);

            return back()->with([
                'success' => __('notifications.update-user-roles')
            ]);
        } else {
            abort(404);
        }
    }

    public function destroy(User $user)
    {
        Gate::authorize('delete-user');
        if ($user->id != 1) {
            $user->delete();
            return back()->with([
                'success' => __('notifications.delete-user')
            ]);
        } else {
            abort(404);
        }
    }
}
