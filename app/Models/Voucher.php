<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucherID',
        'voucherName',
        'voucherNominal',
        'startDate',
        'expiredDate',
        'minimumSpending',
        'voucherQuantity',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'voucherID', 'voucherID');
    }

    public function voucherUsage()
    {
        return $this->hasMany(VoucherUsage::class, 'voucherID', 'voucherID');
    }
}
