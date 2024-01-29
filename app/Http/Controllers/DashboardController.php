<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Bid;
use App\Models\Review;


class DashboardController extends Controller
{
    public function showactiveJobs()
    {
        $employerId = auth()->user()->employer->id; // Get the ID of the authenticated employer
    $activeJobs = Job::where('status', 'active')->where('employer_id', $employerId)->get();
    return view('employer.activejobs', compact('activeJobs'));
    }
    public function showJobStatus(Job $job) {
        $bids = $job->bids;
        return view('employer.jobstatus', compact('bids'));
    }
    public function viewFreelancerProfile(Bid $bid)
    {
        $freelancer = $bid->freelancer;
    
     
        $reviews = Review::join('users', 'reviews.reviewer_id', '=', 'users.id')
                         ->where('reviews.reviewee_id', $freelancer->user_id)
                         ->select('reviews.*', 'users.name as client_name')
                         ->get();
    
        return view('employer.freelancerprofile', compact('freelancer', 'reviews'));
    }
    public function showActiveBids()
{

    $freelancer = auth()->user()->freelancer;
    $activeBids = $freelancer->bids()->whereIn('status', ['pending', 'approved'])->get();
    return view('freelancer.activebids', compact('activeBids' ));
}





    public function hireFreelancer(Bid $bid) {
       
     
            // Update the status of the job to 'hired'
            $bid->job->update(['status' => 'hired']);


            Bid::where('job_id', $bid->job_id)
            ->where('id', '!=', $bid->id)
            ->update(['status' => 'rejected']);
        

            
         
            $bid->update(['status' => 'approved']);
            
          
        
       
        return redirect()->route('employer.jobstatus', ['job' => $bid->job])->with('success', 'Freelancer hired successfully.');
 }


   


  
public function updateBidStatus(Bid $bid) {

    $bid->update(['status' => 'approved']);
    
    return redirect()->route('freelancer.activebids')->with('success', 'Bid status updated successfully.');
}


public function showFreelancerHiredJobs()
{
    $freelancer = auth()->user()->freelancer;
    $hiredJobs = $freelancer->jobs()->where('jobs.status', 'hired')->get();
    return view('freelancer.freelancerhiredjobs', compact('hiredJobs'));
}

public function showHiredJobs()
    {
       
        
        $employerId = auth()->user()->employer->id;

        
        $hiredJobs = Job::where('status', 'hired')
                        ->where('employer_id', $employerId) 
                        ->with('freelancer')
                        ->get();
    
        return view('employer.hiredjobs', compact('hiredJobs'));

 
    
   
}
}
