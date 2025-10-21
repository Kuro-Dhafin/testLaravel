<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ArtistDetail extends Model {
    protected $fillable = ['user_id','status','min_price','max_price','portfolio_link'];
}
