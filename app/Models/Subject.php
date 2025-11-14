<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = [
        'lecture_id', // fk
        'subject_name',
        'semester',
        'credits',
        'description'
    ];

    public $timestamps = false;

    // provide
    public function schedule()
    {
        $this->hasOne(Schedule::class, 'subject_id');
    }

    // belongs to 
    public function subject()
    {
        $this->belongsTo(Lecture::class, 'lecture_id');
    }
}
