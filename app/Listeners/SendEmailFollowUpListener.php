<?php

namespace App\Listeners;

use App\Events\FollowUpEvent;

class SendEmailFollowUpListener
{
    public function __construct()
    {
    }

    public function handle(FollowUpEvent $event)
    {
        $student = $event->student;
        $data = $event->data;
    }
}
