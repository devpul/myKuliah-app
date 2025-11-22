<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public $timestamps = false;

    // provide
    public function schedule()
    {
        $this->hasMany(Schedule::class, 'lecture_id');
    }

    public function subject()
    {
        $this->hasMany(Subject::class, 'lecture_id');
    }
}
