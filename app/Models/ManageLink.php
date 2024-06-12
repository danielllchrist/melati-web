<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageLink extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'linkID';

    protected $keyType = 'string';

    protected $fillable = [
        'linkID',
        'productID',
    ];

    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}
