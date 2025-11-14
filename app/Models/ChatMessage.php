<?php

namespace App\Models;

use App\Models\ChatSession;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';

    protected $fillable = [
        'name',
        'session_id', //fk
        'sender_type', //enum
        'message',
        // timestamp
    ];

    public $timestamps = false;

    public function chat_session()
    {
        $this->belongsTo(ChatSession::class, 'session_id');
    }
}
