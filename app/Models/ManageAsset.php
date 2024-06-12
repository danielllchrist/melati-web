<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAsset extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'assetID';

    protected $keyType = 'string';

    protected $fillable = [
        'assetID',
        'assetPath',
    ];

    public $incrementing = false;
}
