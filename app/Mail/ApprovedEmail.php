<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $subscription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("IE BOOK: Subscription {$this->subscription->code} has been approved")
        ->view('emails.approved')
        ->with('subscription', $this->subscription);
    }
}
