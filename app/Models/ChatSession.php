<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    use HasFactory;

    protected $table = 'chat_sessions';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
    ];

    /**
     * Get the user that owns the chat session.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the messages for the chat session.
     */
    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'session_id');
    }
}
