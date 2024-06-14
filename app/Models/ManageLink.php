<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageLink extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'manage_links';

    protected $primaryKey = 'linkID';

    protected $keyType = 'string';

    protected $guarded = ['linkID'];

    protected $fillable = [
        'productID',
    ];

    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}
