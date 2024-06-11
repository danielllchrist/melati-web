<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'addressID',
        'userID',
        'province',
        'cityOrRegency',
        'nameAddress',
        'detailAddress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'addressID', 'addressID');
    }
}
