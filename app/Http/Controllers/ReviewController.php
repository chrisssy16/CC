<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Bid;
use App\Models\Review;
use App\Models\ReviewEmployer;

class ReviewController extends Controller
{
    public function reviewEmployer($job_id) {
        $job = Job::findOrFail($job_id); 

   
        $employer = $job->employer;
        return view('freelancer.Reviewemp', compact('job_id','employer'));
    }
       
    public function viewFreelancerProfile(Bid $bid) {
        $freelancer = $bid->freelancer;
        $job_id = $bid->job_id; // 
    
        return view('employer.Reviewfreelancer', compact('job_id','freelancer'));
    }
   
    public function submitReviewFreelancer(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'rating' => 'required|numeric|min:1|max:10',
            'comment' => 'nullable|string|max:255', // Adjust max length as needed
            'freelancer_user_id' => 'required|exists:freelancers,user_id', // Validate freelancer user ID
        ]);

        // Assuming you have a logged-in user, get their ID as the reviewer
        $reviewerId = auth()->user()->id;

        // Create a new review instance
        $review = new Review();
        $review->fill([
            'job_id' => $validatedData['job_id'], 
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
            'reviewer_id' => $reviewerId,
            'reviewee_id' => $validatedData['freelancer_user_id'], // Use the freelancer's user ID as the reviewee
        ]);

        // Save the review
        $review->save();

       
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
   

    public function submitReviewEmployer(Request $request)
    {
    
        // Validate the incoming request data
        $validatedData = $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'rating' => 'required|numeric|min:1|max:10',
            'comment' => 'nullable|string|max:255', // Adjust max length as needed
            'employer_user_id' => 'required|exists:employers,user_id', // Validate employer user ID
        ]);

        // Assuming you have a logged-in user, get their ID as the reviewer
        $reviewerId = auth()->user()->id;

        // Create a new review instance
        $reviewemployer = new ReviewEmployer();
        $reviewemployer->fill([
            'job_id' => $validatedData['job_id'], 
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
            'reviewer_id' => $reviewerId,
            'reviewee_id' => $validatedData['employer_user_id'], // Use the employer's user ID as the reviewee
        ]);

        // Save the review
        $reviewemployer->save();

        // Optionally, you can redirect back or to a specific page after saving
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

}



    



