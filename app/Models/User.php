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
        // 'role_id',
        'users_id',
        'mahasiswa_id',      
        'name',         
        'password',         
        'email',         
        'google_id',
        'profile',
    ];

    public $timestamps = false;

    // provide
    public function schedule()
    {
        $this->hasMany(Schedule::class, 'schedule_id');
    }

    public function document()
    {
        $this->hasMany(Document::class, 'users_id');
    }

    public function chat_session()
    {
        $this->hasOne(ChatSession::class, 'users_id');
    }

    // belongs to
    // public function role()
    // {
    //     $this->belongsTo(Role::class, 'role_id');
    // }
}
