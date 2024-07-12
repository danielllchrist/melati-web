<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Cart extends Model
{
    use HasFactory, HasUuids, HasCompositeKey, SoftDeletes {
        HasCompositeKey::getIncrementing insteadof HasUuids;
        HasUuids::getIncrementing as getUuidIncrementing;
    }

    protected $table = 'carts';
    protected $primaryKey = ['userID', 'sizeID'];
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'userID',
        'sizeID',
        'quantity',
    ];

    public function getKeyName()
    {
        return ['userID', 'sizeID'];
    }

    // Override getIncrementing method to resolve conflict
    public function getIncrementing()
    {
        return $this->getUuidIncrementing();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizeID', 'sizeID');
    }
}