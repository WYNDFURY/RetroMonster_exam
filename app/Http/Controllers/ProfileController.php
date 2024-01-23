<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('users.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'new-password' => 'nullable|min:8|confirmed',
        ]);

        // Retrieve the authenticated user
        $user = $request->user();

        // Update user attributes
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password if provided
        $newPassword = $request->input('new-password');
        if ($newPassword) {
            $user->password = Hash::make($newPassword);
        }

        // Save the changes
        $user->save();

        // Redirect back or to a success page
        return Redirect::route('user.edit')->with('status', 'Profile updated successfully');
    }

    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('user.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
