<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;

use App\Models\Review;
use App\Models\ReviewEmployer;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $jobId = $request->input('job_id');
        $job = Job::findOrFail($jobId);

        // Retrieve the associated bid for the job
        $bid = Bid::where('job_id', $jobId)->firstOrFail();

        // Get bid amount
        $paymentAmount = $bid->price;

        // Set your Stripe secret key
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // new Stripe Checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $paymentAmount * 100, 
                    'product_data' => [
                        'name' => $job->job_title, 
                        
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
           
        ]);

      
        return redirect()->away($session->url);
    }


    public function success()
    {
        return "Payment Successful!!!";
    }
   
}
  
    
     
    


