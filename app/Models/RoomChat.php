<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomChat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'room_chats';

    protected $primaryKey = 'roomChatID';

    protected $keyType = 'string';

    protected $guarded = ['roomChatID'];

    protected $fillable = [
        'userID',
        'adminID',
        'lastChatID',
    ];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function lastChat()
    {
        return $this->belongsTo(LastChat::class, 'lastChatID', 'lastChatID');
    }
}
