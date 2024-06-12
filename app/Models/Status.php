<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory,HasUuids;

    protected $primaryKey = 'StatusID';

    protected $keyType = 'string';

    protected $fillable = [
        'statusID',
        'statusName',
        'pic',
    ];

    public $incerementing = false;

    public function statusTransaction()
    {
        return $this->hasMany(StatusTransaction::class, 'statusID', 'statusID');
    }
}
