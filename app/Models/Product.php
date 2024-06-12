<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'product';

    protected $keyType = 'string';

    protected $fillable = [
        'productID',
        'productName',
        'productPrice',
        'productCategory',
        'productDescription',
        'productWeight',
        'productPicturePath',
        'forGender'
    ];

    public $incrementing = false;

    public function cart()
    {
        return $this->hasMany(Cart::class, 'productID', 'productID');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'productID', 'productID');
    }

    public function size()
    {
        return $this->hasMany(Size::class, 'productID', 'productID');
    }

    public function manageLink()
    {
        return $this->hasMany(ManageLink::class, 'productID', 'productID');
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
