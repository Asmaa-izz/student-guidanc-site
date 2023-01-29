<?php

namespace App\Listeners;

use App\Events\VisitEvent;

class SendEmailVisitListener
{
    public function __construct()
    {
    }

    public function handle(VisitEvent $event)
    {
        $student = $event->student;
        $data = $event->data;
    }
}
