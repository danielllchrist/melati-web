<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Cart extends Model
{
    use HasFactory, HasCompositeKey, SoftDeletes;

    protected $table = 'carts';

    protected $primaryKey = ['userID', 'sizeID'];

    protected $keyType = 'string';

    protected $fillable = [
        'userID',
        'sizeID',
        'quantity',
    ];

    public $incrementing = false;

    public function getKeyName()
    {
        return ['userID', 'sizeID'];
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizeID', 'sizeID');
    }
}
