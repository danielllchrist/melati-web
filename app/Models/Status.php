<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory,HasUuids, SoftDeletes;

    protected $table = 'statuses';

    protected $primaryKey = 'StatusID';

    protected $keyType = 'string';

    protected $guarded = ['statusID'];

    protected $fillable = [
        'statusName',
        'pic',
    ];

    public $incerementing = false;

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'statusID', 'statusID');
    }
}
