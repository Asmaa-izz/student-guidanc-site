<?php

namespace App\Listeners;

use App\Events\SessionEvent;

class SendEmailSessionListener
{
    public function __construct()
    {
    }

    public function handle(SessionEvent $event)
    {
        $student = $event->student;
        $data = $event->data;
    }
}
