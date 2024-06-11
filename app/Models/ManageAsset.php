<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'assetID',
        'assetPath',
    ];
}
