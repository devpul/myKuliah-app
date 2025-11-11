<?php

namespace App\Models;

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
}
