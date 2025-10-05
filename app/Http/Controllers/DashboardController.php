<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard overview.
     */
    public function index()
    {
        return view('dashboard.main.index');
    }

    /**
     * Display the settings page.
     */
    public function settings()
    {
        return view('dashboard.settings.index');
    }

    /**
     * Update settings.
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'current_password' => 'nullable|current_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Update profile
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password if provided
        if ($request->filled('new_password')) {
            $user->password = bcrypt($request->new_password);
        }

        $user->save();

        return redirect()->route('settings.index')
            ->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
