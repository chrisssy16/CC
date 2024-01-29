<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\User;
use App\Models\Review;

class FreelancerController extends Controller
{
    public function home()
    {
        return view('freelancer.home');
    }

    public function showSetupProfile()
    {
        // You can customize this method if needed
        return view('setupprofile');
    }

    public function saveProfile(Request $request)
    {
        $user = auth()->user();
        
        $data = $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'job_field' => 'required|string',
            'education' => 'required|string',
            'notable_projects' => 'nullable|string',
            'job_skills' => 'required|string',
            'yearsinindustry' => 'required|string',
            'about' => 'required|string',
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload profile picture if provided
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
            $data['profile_pic'] = $profilePicPath;
        }

        // Create or update Freelancer model associated with the user
        $user->freelancer()->updateOrCreate(['user_id' => $user->id], $data);

        return redirect()->route('freelancer.profile')->with('success', 'Profile saved successfully!');
    }
    
    public function editProfile()
    {
        $user = auth()->user();
        $freelancer = $user->freelancer;
    
        return view('freelancer.editprofile', compact('user', 'freelancer'));
    }
    
    public function updateProfile(Request $request, $id)
    {
        $user = auth()->user();

        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'job_field' => 'required|string',
            'education' => 'required|string',
            'notable_projects' => 'nullable|string',
            'job_skills' => 'required|string',
            'yearsinindustry' => 'required|string',
            'about' => 'required|string',
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update freelancer's profile
        $user->freelancer->update($request->only([
            'name', 'country', 'phone', 'job_field', 'education', 'notable_projects',
            'job_skills', 'yearsinindustry', 'about'
        ]));

        // Handle profile picture upload if provided
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
            $user->freelancer->profile_pic = $profilePicPath;
            $user->freelancer->save();
        }

        return redirect()->route('freelancer.profile')->with('success', 'Profile saved successfully!');
    }

    public function showProfile()
    {
       
        $user = auth()->user();
        $freelancer = $user->freelancer;
        
        // Fetch reviews where the freelancer is the reviewee
        $reviews = Review::join('users', 'reviews.reviewer_id', '=', 'users.id')
            ->where('reviews.reviewee_id', $user->id)
            ->select('reviews.*', 'users.name as client_name')
            ->get();

        return view('freelancer.profile', compact('user', 'freelancer', 'reviews'));
    }
}
