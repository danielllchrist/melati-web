<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Cart extends Model
{
    use HasFactory, HasUuids, HasCompositeKey;

    protected $primaryKey = ['userID', 'productID'];

    protected $keyType = 'string';

    protected $fillable = [
        'userID',
        'productID',
        'quantity',
    ];

    public $incrementing = false;

    public function getKeyName()
    {
        return ['userID', 'productID'];
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}
