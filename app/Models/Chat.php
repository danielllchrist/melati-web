<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'chats';

    protected $primaryKey = 'chatID';

    protected $keyType = 'string';

    protected $guarded = ['chatID'];

    protected $fillable = [
        'userID',
        'message',
        'isImage',
    ];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    // public function lastChat()
    // {
    //     return $this->hasOne(LastChat::class, 'chatID', 'chatID');
    // }
}
