<?php

namespace App\Events;

use App\Models\Job;
use App\Models\Message;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobHired
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $job;
    public $message;

    public function __construct(Job $job, Message $message)
    {
        $this->job = $job;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('job.' . $this->job->id);
    }
    public function markHired(Job $job)
    {
        // Perform validation and authorization checks if needed

        // Update the job status to "Hired"
        $job->update(['status' => 'Hired']);

        // Trigger an event to notify and handle further actions
        event(new JobHired($job));

        return redirect()->back()->with('success', 'Job marked as Hired.');
    }
}