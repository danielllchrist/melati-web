<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'voucherID';

    protected $keyType = 'string';

    protected $fillable = [
        'voucherID',
        'voucherName',
        'voucherNominal',
        'startDate',
        'expiredDate',
        'minimumSpending',
        'voucherQuantity',
    ];

    public $incrementing = false;

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'voucherID', 'voucherID');
    }

    public function voucherUsage()
    {
        return $this->hasMany(VoucherUsage::class, 'voucherID', 'voucherID');
    }
}
