<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'user_id',
        'subject_id',
        'day_of_week',
        'start_time',
        'end_time',
        'room',
        'type',
        'repeat_rule',
    ];

    /**
     * Get the user that owns the schedule.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subject for the schedule.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
