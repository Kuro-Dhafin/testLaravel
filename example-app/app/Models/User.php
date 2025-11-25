<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','email','password','role'];
    protected $hidden = ['password'];

    public function services()
    {
        return $this->hasMany(Service::class, 'user_id'); // fix: use 'user_id'
    }

    public function artistProfile()
    {
        return $this->hasOne(ArtistProfile::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }
}
