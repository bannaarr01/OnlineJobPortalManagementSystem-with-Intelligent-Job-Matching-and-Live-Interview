<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Declined extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $declinedData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($declinedData)
    {
        $this->declinedData = $declinedData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.declinedEmail');
    }
}
