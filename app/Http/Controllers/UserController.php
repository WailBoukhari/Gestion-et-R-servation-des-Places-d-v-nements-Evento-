<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Permission;

class UserController extends Controller
{
    public function index()
    {
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


        // Suspend the user
        $user->is_suspended = true;
        $user->save();

        return redirect()->back()->with('success', 'User suspended successfully.');
    }
    public function activate(User $user)
    {

        // Activate user logic
        $user->is_suspended = false;
        $user->save();

        return redirect()->back()->with('success', 'User activated successfully');
    }
}
