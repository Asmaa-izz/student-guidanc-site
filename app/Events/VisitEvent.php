<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class VisitEvent
{
    use Dispatchable;
    public $student;
    public $data;

    public function __construct($student, $data)
    {
        $this->student = $student;
        $this->data = $data;
    }
}
