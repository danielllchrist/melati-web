<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastChat extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'lastChatID';

    protected $keyType = 'string';

    protected $fillable = [
        'lastChatID',
        'chatID',
        'lastMessage',
        'lastSentUserID',
    ];

    public $incrementing = false;

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chatID', 'chatID');
    }

    public function roomChat()
    {
        return $this->hasOne(RoomChat::class, 'lastChatID', 'lastChatID');
    }
}
