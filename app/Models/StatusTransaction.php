<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thiagoprz\CompositeKey\HasCompositeKey;

class StatusTransaction extends Model
{
    use HasFactory, HasCompositeKey, SoftDeletes;

    protected $table = 'status_transactions';

    protected $primaryKey = ['transactionID', 'statusID'];

    protected $keyType = 'string';

    protected $fillable = [
        'transactionID',
        'statusID',
    ];

    public $incrementing = 'false';

    public function getKeyName(){
        return ['transactionID','statusID'];
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactionID', 'transactionID');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'statusID', 'statusID');
    }
}
