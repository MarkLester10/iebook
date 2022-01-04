<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SubscriptionReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $currentSubscription;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($currentSubscription, $email)
    {
        $this->currentSubscription = $currentSubscription;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new SubscriptionReminder($this->currentSubscription));
    }
}
