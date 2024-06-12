<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomChat extends Model
{
    use HasFactory;

    protected $primaryKey = 'roomChat';

    protected $keyType = 'string';

    protected $fillable = [
        'roomChatID',
        'userID',
        'lastChatID',
    ];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function lastChat()
    {
        return $this->belongsTo(LastChat::class, 'lastChatID', 'lastChatID');
    }
}
