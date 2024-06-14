<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Size extends Model
{
    use HasFactory, HasUuids, HasCompositeKey, SoftDeletes;

    protected $table = 'sizes';

    protected $primaryKey = ['sizeID','productID'];

    protected $keyType = 'string';

    protected $guarded = ['sizeID'];

    protected $fillable = [
        'productID',
        'size',
        'stock'
    ];

    public $incrementing = false;

    public function getKeyName(){
        return['sizeID','productID'];
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}
