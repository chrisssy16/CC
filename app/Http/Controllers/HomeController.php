<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Auth;
use App\Models\User;

class HomeController extends Controller
{
  


    public function redirect()
    {
        if (auth()->check()) {
            $role = auth()->user()->role;

            // Render views based on user role
            switch ($role) {
                case 'admin':
                    return view('admin.home');
                case 'employer':
                    return view('employer.home');
                case 'freelancer':
                    return view('freelancer.home');
                // Add more roles if needed
            }
        }

        // If not authenticated or role not recognized, show the default freelancer dashboard
        return view('freelancer.home');
    }
    public function setupProfile()
    {
        
        return view('freelancer.setupprofile');
    }

    public function viewJob()
    {
        
        return view('freelancer.viewjob');
    }
    public function appliedJobs()
    {
      
        return view('freelancer.appliedjobs');
    }
    public function profile()
    {
     
        return view('freelancer.profile');
    }
    
public function showSetupProfile()
{
    $user = auth()->user(); // Get the authenticated user
    return view('setup_profile', compact('user'));
}

}



