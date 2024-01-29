<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Bid;
use App\Models\Review;
use App\Models\ReviewEmployer;

class BidController extends Controller
{
    public function setBidForm($job_id)
    {
       
        {
            return view('freelancer.setbidform', ['job_id' => $job_id]);
        }
    }

    public function submitBid(Request $request, $job_id)
    {
        // Validate form data
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);
    
        // Save bid data to the database
        $bid = new Bid();
        $bid->job_id = $job_id;
        $bid->price = $validatedData['price'];
        $bid->date = $validatedData['date'];
        $bid->note = $validatedData['note'];
        
        // Associate bid with the freelancer
        auth()->user()->freelancer->bids()->save($bid);
    
        return redirect()->route('freelancer.home')->with('success', 'Bid submitted successfully!');
    }
    public function withdrawBid(Bid $bid)
{
    

    // Delete the bid
    $bid->delete();

    return redirect()->back()->with('success', 'Bid withdrawn successfully');
}

public function employerProfile($job_id)
{
    $job = Job::findOrFail($job_id); 
    $user = auth()->user();
    
   
    $employer = $job->employer;
    
    
    $reviewsemployer = ReviewEmployer::join('users', 'review_employers.reviewer_id', '=', 'users.id')
    ->where('review_employers.reviewee_id', $employer->user_id) // Filter by employer's user ID
    ->select('review_employers.*', 'users.name as freelancer_name')
    ->get();

    
    return view('freelancer.employerprofile', compact('user' ,'employer','reviewsemployer'));
}
public function rejectBid($bidId)
{
    $bid=Bid::findorfail($bidId);
    $bid->delete(); 

    return redirect()->back()->with('success', 'Bid rejected successfully.');
}
    
}

