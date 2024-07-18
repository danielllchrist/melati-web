<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;

    protected $table = 'return_orders';
    protected $primaryKey = 'transactionID';
    protected $keyType = 'string';
    protected $fillable = [
        'transactionID',
        'comment',
    ];

    public $incrementing = false;

    // relation one on one with transaction
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactionID', 'transactionID');
    }

}
