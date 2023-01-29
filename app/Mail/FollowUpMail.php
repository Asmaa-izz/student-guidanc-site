<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class FollowUpMail extends Mailable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $student = $this->data->student->name;
        return $this
            ->subject( $student .'تقرير الطالب ')
            ->view('emails.follow-up', [
            'student' => $this->data->student,
            'record' => $this->data,
        ]);
    }
}
