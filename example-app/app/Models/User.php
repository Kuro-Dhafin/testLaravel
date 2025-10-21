<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ArtistProfile;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = ['name','email','password','role'];
    protected $hidden = ['password','remember_token'];

    public function profile() {
        return $this->hasOne(ArtistProfile::class);
    }
}
