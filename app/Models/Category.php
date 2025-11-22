<?php

namespace App\Models;

use App\Models\Todolist;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name','description'];

    public $timestamps = false;

    // provide
    public function todolist()
    {
        $this->hasOne(Todolist::class, 'category_id');
    }
}
