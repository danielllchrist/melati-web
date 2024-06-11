<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'chatID',
        'userID',
        'message',
        'isImage',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function lastChat()
    {
        return $this->hasOne(LastChat::class, 'chatID', 'chatID');
    }
}
