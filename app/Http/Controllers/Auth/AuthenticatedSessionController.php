<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Check if the user is suspended before attempting authentication
        $user = User::where('email', $credentials['email'])->first();
        if ($user && $user->is_suspended) {
            // Optionally, you can log the attempt here
            return redirect()->route('suspended.page');
        }
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->is_suspended) {
            return redirect()->route('suspended.page');
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('organizer')) {
            return redirect()->route('organizer.dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
            if ($existingUser->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($existingUser->hasRole('organizer')) {
                return redirect()->route('organizer.dashboard');
            } elseif ($existingUser->hasRole('user')) {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {

            $newUser = new User();
            $newUser->name = $googleUser->getName();
            $newUser->email = $googleUser->getEmail();
            $newUser->password = Hash::make(Str::random(16));
            $newUser->email_verified_at = now();
            $newUser->remember_token = Str::random(10);
            $newUser->save();

            $role = Role::where('name', 'user')->first();
            $newUser->assignRole($role);

            Auth::login($newUser);
            return redirect()->route('user.dashboard');
        }
    }
}
