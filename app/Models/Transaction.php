<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,HasUuids, SoftDeletes;

    protected $table = 'transactions';

    protected $primaryKey = 'transactionID';

    protected $keyType = 'UnsignBigInteger';

    protected $guarded = ['transactionID'];

    protected $fillable = [
        'userID',
        'addressID',
        'voucherID',
        'statusID',
        'subTotalPrice',
        'totalWeight',
        'totalDiscount',
        'shippingFee',
        'totalPrice',
        'paymentMethod',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'addressID', 'addressID');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'statusID', 'statusID');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucherID', 'voucherID');
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transactionID', 'transactionID');
    }

    public function returnOrder()
    {
        return $this->hasOne(ReturnOrder::class, 'transactionID', 'transactionID');
    }
}
