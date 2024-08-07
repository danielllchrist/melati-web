<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thiagoprz\CompositeKey\HasCompositeKey;

class TransactionDetail extends Model
{
    use HasFactory, HasCompositeKey, SoftDeletes;

    protected $table = 'transaction_details';

    protected $primaryKey = ['transactionID', 'sizeID'];

    protected $keyType = 'string';

    protected $fillable = [
        'transactionID',
        'productID',
        'quantity',
        'price',
        'weight',
    ];

    public $incrementing = false;

    public function getIncrementing()
    {
        return false; // Tidak menggunakan incrementing keys
    }

    public function getKeyName()
    {
        return ['transactionID', 'productID'];
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactionID', 'transactionID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizeID', 'sizeID');
    }
}
