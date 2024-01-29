<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/',[HomeController::class,'redirect']);


Route::get('/home',[HomeController::class,'redirect']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




// routes/web.php



Route::get('/setupprofile', [HomeController::class, 'setupProfile'])->name('setupprofile')->middleware('auth.guest');
Route::get('/viewjob', [HomeController::class, 'viewJob'])->name('viewjob')->middleware('auth.guest');
Route::get('/appliedjobs', [HomeController::class, 'appliedJobs'])->name('appliedjobs')->middleware('auth.guest');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth.guest');

// frelancer
Route::middleware(['auth'])->group(function () {
    Route::get('/setup.profile', [FreelancerController::class, 'showSetupProfile'])->name('setup.profile');
    Route::get('/freelancer/home', [FreelancerController::class, 'home'])->name('freelancer.home');

    Route::post('/save/freelancer/profile', [FreelancerController::class, 'saveProfile'])->name('save.freelancer.profile');
   Route::get('/editprofile', [FreelancerController::class, 'editProfile'])->name('editprofile');
    Route::post('/updateprofile/{id}', [FreelancerController::class, 'updateProfile'])->name('updateprofile');
    Route::get('/profile', [FreelancerController::class, 'showProfile'])->name('freelancer.profile');

});

// Employer
Route::middleware(['auth'])->group(function () {
  Route::get('/employerprofile', [EmployerController::class, 'profile'])->name('employer.employerprofile');
  Route::get('/employerhome', [EmployerController::class, 'profile'])->name('employer.home');
  Route::get('/makeprofile', [EmployerController::class, 'showMakeProfile'])->name('employer.showMakeProfile');
  Route::get('/employeredit', [EmployerController::class, 'editProfile'])->name('employer.employeredit');
  Route::post('/save/profile', [EmployerController::class, 'saveProfile'])->name('save.profile');
  Route::post('/update.profile/{id}', [EmployerController::class, 'updateProfile'])->name('update.profile');
  
});
Route::get('/postjob', [JobController::class, 'showJobform'])->name('employer.postjob')->middleware('auth');;
Route::post('/postjob', [JobController::class, 'postJob'])->name('employer.postjob')->middleware('auth');
Route::get('/jobslist', [JobController::class, 'jobList'])->name('employer.jobslist')->middleware('auth');

Route::get('/job/edit/{job}', [JobController::class, 'edit'])->name('job.edit')->middleware('auth');
Route::post('/update/job/{job}', [JobController::class, 'update'])->name('update.job')->middleware('auth');
Route::delete('/job/delete/{job}', [JobController::class, 'delete'])->name('job.delete')->middleware('auth');
Route::get('viewjob', [JobController::class, 'viewjob'])->name('freelancer.viewjob');
Route::get('/filter/jobs', [JobController::class, 'filterJobs'])->name('filter.jobs');


Route::get('/setbidform/{job_id}', [BidController::class, 'setBidForm'])->name('freelancer.setbidform');
Route::get('/employerprofile/{job_id}', [BidController::class, 'employerProfile'])->name('freelancer.employerprofile');
Route::post('/submit/bid/{job_id}', [BidController::class, 'submitBid'])->name('submit.bid');
Route::delete('/freelancer/withdraw-bid/{bid}', [BidController::class, 'withdrawBid'])->name('freelancer.withdrawBid');

Route::delete('/rejectbid/{bidId}', [BidController::class, 'rejectBid'])->name('rejectbid');

Route::get('/activejobs', [DashboardController::class, 'showactiveJobs'])->name('employer.activejobs');



Route::get('/jobstatus/{job}', [DashboardController::class, 'showJobStatus'])->name('employer.jobstatus');
Route::get('/freelancerprofile/{bid}', [DashboardController::class, 'viewFreelancerProfile'])->name('employer.freelancerprofile');
Route::get('/activebids', [DashboardController::class, 'showActiveBids'])->name('freelancer.activebids');


Route::put('/bids/{bid}/update-status', [DashboardController::class, 'updateBidStatus'])->name('bids.updateStatus');
Route::get('/hire/freelancer/{bid}', [DashboardController::class, 'hireFreelancer'])->name('hire.freelancer');

Route::get('/freelancerhiredjobs', [DashboardController::class, 'showfreelancerHiredJobs'])->name('freelancer.freelancerhiredjobs');

Route::get('/hiredjobs', [DashboardController::class, 'showHiredJobs'])->name('employer.hiredjobs');


Route::post('/markAscompleted/{job}', [JobController::class, 'markAsCompleted'])->name('markAsCompleted');


Route::get('/Reviewemp/{job}', [ReviewController::class, 'reviewEmployer'])->name('freelancer.Reviewemp');
Route::get('/Reviewfreelancer/{bid}', [ReviewController::class, 'viewFreelancerProfile'])->name('employer.Reviewfreelancer');


Route::POST('/submitreviewFreelancer', [ReviewController::class, 'submitReviewFreelancer'])->name('submitreviewFreelancer');
Route::POST('/submitreviewEmployer', [ReviewController::class, 'submitReviewEmployer'])->name('submitreviewEmployer');




Route::post('/session/{jobId}',[StripeController::class,'session'])->name('session');
Route::get('/success', [StripeController::class,'session'])->name('success');

route::get('auth/google',[GoogleController::class,'googlepage']);

route::get('auth/google/callback',[GoogleController::class,'googlecallback']);
