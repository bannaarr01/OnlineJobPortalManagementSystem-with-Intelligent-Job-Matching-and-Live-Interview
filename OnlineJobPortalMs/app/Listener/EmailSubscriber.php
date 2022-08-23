<?php

namespace App\Listener;
use Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserSubscribed;
use Illuminate\Support\Facades\DB;

class EmailSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        //dd($event->email);
        // DB::table('newsletter')->insert([
        //     'email' => $event->email
        // ]);
        
        // Mail::to($event->email)->send(new UserSubscribedMessage());
    }
}
