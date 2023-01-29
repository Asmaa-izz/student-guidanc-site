<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class VisitMail extends Mailable
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
            ->subject($student . ' تقرير الطالب: ')
            ->view('emails.visit', [
                'student' => $this->data->student,
                'record' => $this->data,
                'title' => 'تقرير زيارة ولي الأمر'
            ]);
    }
}
