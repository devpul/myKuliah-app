<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $table = 'todolists';

    protected $fillable = [
        'user_id',
        'subject_id',
        'category_id',
        'title',
        'description',
        'type',
        'due_date',
        'time',
        'room',
        'priority',
        'status',
        'completed_at',
        'reminder_at',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'due_date' => 'date',
        'completed_at' => 'datetime',
        'reminder_at' => 'datetime',
    ];

    /**
     * Get the user that owns the todolist item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subject for the todolist item.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the category for the todolist item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
