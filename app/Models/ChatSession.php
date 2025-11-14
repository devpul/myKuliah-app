<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    protected $table = 'chat_sessions';

    protected $fillable = [
        'user_id',
        'title',
        // 'created_at' // timestamp
    ];

    public const UPDATED_AT = null;

    // provide
    public function chat_message()
    {
        $this->hasMany(ChatMessage::class, 'session_id');
    }

    // belongs to
    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
