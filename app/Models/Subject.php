<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'code',
        'name',
        'lecture_name',
        'semester',
        'credits',
        'room',
        'color',
        'description',
    ];

    /**
     * Get the schedules for the subject.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get the todolists for the subject.
     */
    public function todolists()
    {
        return $this->hasMany(Todolist::class);
    }
}
