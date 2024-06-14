<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thiagoprz\CompositeKey\HasCompositeKey;

class VoucherUsage extends Model
{
    use HasFactory, HasUuids, HasCompositeKey, SoftDeletes;

    protected $table = 'voucher_usages';

    protected $primaryKey = ['voucherID','userID'];

    protected $keyType = 'string';

    protected $fillable = [
        'voucherID',
        'userID',
    ];

    public $incrementing = false;

    public function getKeyName()
    {
        return['voucherID','userID'];
    }

    public function voucher ()
    {
        return $this->belongsTo(Voucher::class, 'voucherID', 'voucherID');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
