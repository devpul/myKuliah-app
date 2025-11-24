<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lecture;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'matakuliahs';

    protected $fillable = [ //fk
        'users_id',
        'days',
        // timestamps
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'users_id');
    }
}
