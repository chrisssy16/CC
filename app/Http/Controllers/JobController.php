<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\User;
use App\Models\Job;
use App\Models\Bid;
use App\Models\Review;

class JobController extends Controller
{
    public function showJobform(){
        return view('employer.postjob');
    }
    public function postJob(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_description' => 'required|string',
        'category' => 'required|string',
        'budget_range' => 'required|string',
        'deadline' => 'required|date',
    ]);

    // Create a new job instance
    $job = new Job([
        'job_title' => $validatedData['job_title'],
        'job_description' => $validatedData['job_description'],
        'category' => $validatedData['category'],
        'budget_range' => $validatedData['budget_range'],
        'deadline' => $validatedData['deadline'],
        // Add other fields as needed
    ]);

    // Save the job to the database
    auth()->user()->employer->jobs()->save($job);


    // Redirect back with a success message
    return redirect()->route('employer.jobslist')->with('success', 'Job posted successfully');
}
public function jobList()
{
    $jobs = auth()->user()->employer->jobs;
    // Retrieve jobs 

    return view('employer.jobslist', compact('jobs'));
}
public function edit(Job $job)
    {
        return view('employer.editjob', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'category' => 'required|string',
            'budget_range' => 'required|string',
            'deadline' => 'required|date',
        ]);

        // Update the job instance
        $job->update([
            'job_title' => $validatedData['job_title'],
            'job_description' => $validatedData['job_description'],
            'category' => $validatedData['category'],
            'budget_range' => $validatedData['budget_range'],
            'deadline' => $validatedData['deadline'],
            // Add other fields as needed
        ]);

        return redirect()->route('employer.jobslist')->with('success', 'Job updated successfully');
    }

    public function delete(Job $job)
    {
        $job->delete();

        return redirect()->route('employer.jobslist')->with('success', 'Job deleted successfully');
    }
    public function viewjob(Job $job)
    {
        $jobs = Job::all(); // Retrieve all jobs
    
       
        return view('freelancer.viewjob', compact('jobs'));
    }
    
    public function filterJobs(Request $request)
    {
        $query = Job::query();
    
        if ($request->filled('filter_category')) {
            $query->where('category', $request->input('filter_category'));
        }
    
        if ($request->filled('filter_budget')) {
            $query->where('budget_range', $request->input('filter_budget'));
        }
    
        $jobs = $query->get(); 
    
        // Return the filtered jobs to the view
        return view('freelancer.viewjob', compact('jobs'));
    }
    public function markAsCompleted(Job $job) {
      
        $job->update(['post_status' => 'complete']);
        return redirect()->route('freelancer.Reviewemp', ['job' => $job->id]);
 }


    
       
    


}



