<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LastChat extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'last_chats';

    protected $primaryKey = 'lastChatID';

    protected $keyType = 'string';

    protected $guarded = 'lastChatID';

    protected $fillable = [
        // chat gada di ERD dan migrations
        'chatID',
        'lastMessage',
        'lastSentUserID',
    ];

    public $incrementing = false;

    // public function chat()
    // {
    //     return $this->belongsTo(Chat::class, 'chatID', 'chatID');
    // }

    public function roomChat()
    {
        return $this->hasOne(RoomChat::class, 'lastChatID', 'lastChatID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'lastSentUserID', 'userID');
    }
}
