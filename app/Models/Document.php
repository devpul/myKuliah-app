<?php

namespace App\Models;

use App\Models\User;
use App\Models\Todolist;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'user_id', // fk
        'title',
        'description',
        'file_attachment',
        //timestamps
    ];

    // provide
    public function todolist()
    {
        $this->hasOne(Todolist::class, 'document_id');
    }

    // belongs to
    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
