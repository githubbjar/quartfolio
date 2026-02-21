<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $adminEmail = config('admin.email');
        $adminHash = config('admin.password_hash');

        $emailOk = $adminEmail && hash_equals($adminEmail, $data['email']);
        $passOk = $adminHash && Hash::check($data['password'], $adminHash);

        if (! $emailOk || ! $passOk) {
            return back()
                ->withErrors(['email' => 'Invalid credentials.'])
                ->onlyInput('email');
        }

        // prevent session fixation
        $request->session()->regenerate();

        // your "auth token"
        $request->session()->put('admin_logged_in', true);

        return redirect()->route('projects.index')
            ->with('success', 'Admin login successful.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Admin logout successful.');
    }
}
