<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageAsset extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'manage_assets';

    protected $primaryKey = 'assetID';

    protected $keyType = 'string';

    protected $guarded = ['assetID'];

    protected $fillable = [
        'assetPath',
    ];

    public $incrementing = false;
}
