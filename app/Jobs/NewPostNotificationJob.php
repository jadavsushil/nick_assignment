<?php

namespace App\Jobs;

use App\Mail\NewPostMail;
use App\Models\Website;
use App\Notifications\NewPostNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NewPostNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $newPost;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($newPost)
    {
        $this->newPost = $newPost;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subscribers = Website::with('users')->where('id', $this->newPost->website_id)->first();
        foreach ($subscribers->users as $aUser) {
            Notification::send($aUser, new NewPostNotification($this->newPost));
        }
    }
}
