<?php

namespace App\Listeners;

use App\Events\DemoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DemoListener
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
     * @param  DemoEvent  $event
     * @return void
     */
    public function handle(DemoEvent $event)
    {
        //
    }
}
