<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUpRecord extends Model
{
    protected $guarded = ['id'];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'source_id');
    }
}
