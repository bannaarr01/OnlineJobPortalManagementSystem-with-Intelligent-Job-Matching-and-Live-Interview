<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterviewInvite extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $inviteData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inviteData)
    {
        $this->inviteData = $inviteData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.inviteEmail');
    }
}
