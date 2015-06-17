<?php

namespace CodeCommerce\Handlers\Events;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailCheckout
{

    public function __construct()
    {
        //
    }

    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();
        $order = $event->getOrder();

    }
}
