<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class SessionsMail extends Mailable
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
            ->view('emails.sessions', [
            'session' => $this->data,
        ]);
    }
}
