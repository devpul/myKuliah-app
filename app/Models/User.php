<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Document;
use App\Models\ChatSession;
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

    // provide
    public function schedule()
    {
        $this->hasMany(Schedule::class, 'schedule_id');
    }

    public function document()
    {
        $this->hasMany(Document::class, 'user_id');
    }

    public function chat_session()
    {
        $this->hasOne(ChatSession::class, 'user_id');
    }

    // belongs to
    public function role()
    {
        $this->belongsTo(Role::class, 'role_id');
    }
}
