<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistProfile extends Model
{
    protected $fillable = [
        'user_id','display_name','bio',
        'profile_image','specialization','portfolio_link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
