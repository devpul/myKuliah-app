<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lecture;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'subject_id', //fk
        'lecture_id', //fk
        'user_id',
        'days',
        'start_at', //time
        'end_at', //time
        'room',
        // timestamps
    ];

    // belongs to
    public function subject()
    {
        $this->belongsTo(Subject::class, 'subject_id');
    }

    public function lecture()
    {
        $this->belongsTo(Lecture::class, 'lecture_id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
