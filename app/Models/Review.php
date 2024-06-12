<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Review extends Model
{
    use HasFactory, HasUuids, HasCompositeKey;

    protected $primaryKey = ['productID', 'transactionID'];

    protected $keyType = 'string';

    protected $fillable = [
        'productID',
        'transactionID',
        'rating',
        'comment',
    ];

    public $incrementing = false;

    public function getKeyName()
    {
        return ['custom_order_id', 'custom_item_id'];
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactionID', 'transactionID');
    }
}
