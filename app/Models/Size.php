<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'sizes';

    protected $primaryKey = 'sizeID';

    protected $keyType = 'string';

    protected $guarded = 'sizeID';

    protected $fillable = [
        'productID',
        'size',
        'stock'
    ];

    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'sizeID', 'sizeID');
    }
}
