<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucherID',
        'userID',
    ];

    public function voucher ()
    {
        return $this->belongsTo(Voucher::class, 'voucherID', 'voucherID');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
