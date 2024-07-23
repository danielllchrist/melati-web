<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'productID';

    protected $keyType = 'string';

    protected $guarded = ['productID'];

    protected $fillable = [
        'productName',
        'productPrice',
        'productCategory',
        'productDescription',
        'productWeight',
        'productPicturePath',
        'forGender'
    ];

    public $incrementing = false;

    // mendapatkan foto pertama untuk thumbnail
    public function getThumbnailAttribute()
    {
        if ($this->productPicturePath) {
            return Storage::url(json_decode($this->productPicturePath)[0]);
        }

        return 'https://via.placeholder.com/800x600';
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'productID', 'productID');
    }

    public function size()
    {
        return $this->hasMany(Size::class, 'productID', 'productID');
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'productID', 'productID');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'productID', 'productID');
    }
}
