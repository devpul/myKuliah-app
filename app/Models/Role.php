<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];

    public $timestamps = false;

    // provide
    public function user()
    {
        $this->hasOne(User::class, 'role_id');
    }
}
