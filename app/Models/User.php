<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'role_id', //FK
        'name',         
        'password',         
        'email',         
        'address',         
        'image',         
    ];

    public $timestamps = false;

    public function role()
    {
        $this->belongsTo(Role::class, 'role_id');
    }
}
