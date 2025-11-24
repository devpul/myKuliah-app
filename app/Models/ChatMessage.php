<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $table = 'chat_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'session_id',
        // 'message' // This column seems to be missing in the migration
    ];

    /**
     * Get the chat session that owns the message.
     */
    public function session()
    {
        return $this->belongsTo(ChatSession::class, 'session_id');
    }
}
