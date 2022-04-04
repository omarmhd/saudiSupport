<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Mail\NewOrderMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderNotficationListener
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
    public function handle(NewOrder $event)
    {
        $order=$event->get_order();
        $added_by=$order->added_by;
        $users=User::all();

        Mail::to('omarmhd19988@gmail.com')->send(new NewOrderMail($order));




    }
}
