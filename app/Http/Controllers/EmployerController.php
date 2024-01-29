<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Bid;
use App\Models\Freelancer;
use App\Models\Review;
use App\Models\ReviewEmployer;



class EmployerController extends Controller
{
 public function home()
    {
        // Logic for the home page
        return view('employer.home');
    }

public function profile()
    {
        
        $user = auth()->user();
        $employer = $user->employer;
        
        
        
        $reviewsemployer = ReviewEmployer::join('users', 'review_employers.reviewer_id', '=', 'users.id')
        ->where('review_employers.reviewee_id', $user->id)
        ->select('review_employers.*', 'users.name as freelancer_name')
        ->get();
    
            // Pass user, employer, and reviews to the view
            return view('employer.employerprofile', compact('user', 'employer', 'reviewsemployer'));
        }
    
    
  

   
  public function showMakeProfile()
    {
        // You can customize this method if needed
        return view('employer.makeprofile');
    }

  public function saveProfile(Request $request)
    {
        // Validate form data
        $data = $request->validate([
     'company_name' => 'required|string',
       'country' => 'required|string',
       'years_in_industry' => 'required|integer',
       'about' => 'required|string',
       'freelancers_collaborated' => 'integer', // Adjust as per your validation needs
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
            $data['profile_pic'] = $profilePicPath;
      
        }

        // Create or update Employer model associated with the user
        auth()->user()->employer()->updateOrCreate(['user_id' => auth()->id()], $data);

        return redirect()->route('employer.employerprofile')->with('success', 'Profile saved successfully!');
    }
 public function editProfile()
    {
        $user = auth()->user();
        $employer = $user->employer;

        // Check if the employer profile exists
        if ($employer) {
            return view('employer.employeredit', compact('user', 'employer'));
        } else {
            // If the employer profile doesn't exist, you can handle it accordingly
            return view('employer.employeredit')->with('error', 'Employer profile not found.');
        }
    }


  
 public function updateProfile(Request $request, $id)
    {
       
            // Validate the form data
            $request->validate([
                'company_name' => 'required|string',
                'country' => 'required|string',
                'yearsinindustry' => 'required|integer',
                'about' => 'required|string',
                'freelancers_collaborated' => 'required|integer',
                'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
            ]);
    
            // Find the user by ID
            $employer = Employer::findOrFail($id);
    
            // Update the user's profile
            $employer->update([
                'company_name' => $request->input('company_name'),
                'country' => $request->input('country'),
                'years_in_industry' => $request->input('yearsinindustry'),
                'about' => $request->input('about'),
                'freelancers_collaborated' => $request->input('freelancers_collaborated'),
            ]);
    
            // Handle profile picture upload if provided
            if ($request->hasFile('profile_pic')) {
                $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
                $employer->profile_pic = $profilePicPath;
                $employer->save();
            }
    
            // Redirect back or to a success page
              return redirect()->route('employer.employerprofile')->with('success', 'Profile saved successfully!');
        }
       
    }