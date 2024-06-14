<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Wishlist extends Model
{
    use HasFactory, HasUuids, HasCompositeKey, SoftDeletes;

    protected $table = 'wishlists';

    protected $primaryKey =['userID','productID'];

    protected $keyType = 'string';

    protected $fillable = [
        'userID',
        'productID',
    ];

    public $incrementing = false;

    public function getKeyName()
    {
        return ['userID','productID'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
