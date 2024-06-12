<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $primaryKey = 'userID';

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userID',
        'name',
        'gender',
        'phoneNum',
        'email',
        'age',
        'password',
        'profilePicturePath',
    ];

    public $incrementing = false;

    public function address ()
    {
        return $this->hasMany(Address::class, 'userID', 'userID');
    }

    public function chat (){
        return $this->hasMany(Chat::class, 'userID', 'userID');
    }

    public function cart ()
    {
        return $this->hasMany(Cart::class, 'userID', 'userID');
    }

    public function wishlist ()
    {
        return $this->hasMany(Wishlist::class, 'userID', 'userID');
    }

    public function transaction ()
    {
        return $this->hasMany(Transaction::class, 'userID', 'userID');
    }

    public function voucherUsage ()
    {
        return $this->hasMany(VoucherUsage::class, 'userID', 'userID');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
