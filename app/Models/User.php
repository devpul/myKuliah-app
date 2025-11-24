<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Document;
use App\Models\ChatSession;
use App\Models\Schedule;
use App\Models\Todolist;
use App\Models\Activity;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'name',         
        'password',         
        'email',         
        'google_id',
        'mahasiswa_id',      
    ];

    public $timestamps = false;

    // provide
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'user_id');
    }

    public function document()
    {
        $this->hasMany(Document::class, 'user_id');
    }

    public function chat_session()
    {
        return $this->hasOne(ChatSession::class, 'user_id');
    }

    public function todolists()
    {
        return $this->hasMany(Todolist::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    // belongs to
    public function role()
    {
        $this->belongsTo(Role::class, 'role_id');
    }
}
