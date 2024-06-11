<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastChatID',
        'chatID',
        'lastMessage',
        'lastSentUserID',
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chatID', 'chatID');
    }

    public function roomChat()
    {
        return $this->hasOne(RoomChat::class, 'lastChatID', 'lastChatID');
    }
}
