<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory, HasCompositeKey, HasUuids {
        HasCompositeKey::getIncrementing insteadof HasUuids;
        HasUuids::getIncrementing as getUuidIncrementing;
    }

    protected $table = 'wishlists';

    protected $primaryKey =['userID','productID'];

    protected $keyType = 'string';

    protected $fillable = [
        'userID',
        'productID'
    ];

    public $incrementing = false;

    public function getKeyName()
    {
        return ['userID','productID'];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }

}
