<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $existingUser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();

            if ($existingUser) {
                Auth::login($existingUser);
                return redirect()->intended('redirect');
            } else {
                // Create a new user only if the email doesn't already exist
                $newUser = User::firstOrNew(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                    'role' => $this->determineUserRole($user->email)
                ]);

                // If the user was just created (not already in the database), save it
                if (!$newUser->exists) {
                    $newUser->save();
                }

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Helper function to determine user role based on email
    protected function determineUserRole($email)
    {
        // You can implement your logic here to determine the user role based on email
        // For example, you might check the email domain or other criteria

        // For demonstration purposes, let's assume if the email contains 'employer', assign role 2
        if (strpos($email, 'employer') !== false) {
            return 2; // Employer
        } elseif (strpos($email, 'admin') !== false) {
            return 1; // Admin
        } else {
            return 3; // Freelancer (default)
        }
    }
}
