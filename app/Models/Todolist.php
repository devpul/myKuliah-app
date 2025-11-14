<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $table = 'todolists';

    protected $fillable = [
        'document_id',
        'category_id',
        'title',
        'status',
        'priority',
        'due_date', //dateTime
    ];

    public $timestamps = false;

    // belongs To
    public function category()
    {
        $this->belongsTo(Category::class, 'category_id');
    }
}
