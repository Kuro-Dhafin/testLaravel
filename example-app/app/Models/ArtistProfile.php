<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ArtistProfile extends Model
{
    protected $fillable = ['user_id','bio','speciality','portfolio_link','instagram','twitter','artstation'];
    public function user(){ return $this->belongsTo(User::class); }
}
