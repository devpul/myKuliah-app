<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    /**
     * Get the todolists for the category.
     */
    public function todolists()
    {
        return $this->hasMany(Todolist::class);
    }
}
