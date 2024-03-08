<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // Check if the user has permission to manage users
        if (!auth()->user()->hasPermissionTo('manage users')) {
            abort(403, 'Unauthorized action.');
        }

        // Retrieve all users except the admin user
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return view('admin.users.index', compact('users'));
    }

    public function suspend(User $user)
    {
        // Check if the user has permission to suspend users
        if (!auth()->user()->hasPermissionTo('suspend users')) {
            abort(403, 'Unauthorized action.');
        }

        // Suspend the user
        $user->is_suspended = true;
        $user->save();

        return redirect()->back()->with('success', 'User suspended successfully.');
    }

    public function activate(User $user)
    {
        // Check if the user has permission to activate users
        if (!auth()->user()->hasPermissionTo('activate users')) {
            abort(403, 'Unauthorized action.');
        }

        // Activate user logic
        $user->is_suspended = false;
        $user->save();

        return redirect()->back()->with('success', 'User activated successfully');
    }
    public function changeUserRole(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Remove the current role (assuming it's 'user')
        $user->removeRole('user');

        // Assign the organizer role
        $organizerRole = Role::where('name', 'organizer')->first();
        $user->assignRole($organizerRole);

        // Redirect back to the dashboard or any other page
        return redirect()->route('organizer.dashboard');
    }
}
