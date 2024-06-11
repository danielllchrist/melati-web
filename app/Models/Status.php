<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'statusID',
        'statusName',
        'pic',
    ];

    public function statusTransaction()
    {
        return $this->hasMany(StatusTransaction::class, 'statusID', 'statusID');
    }
}
