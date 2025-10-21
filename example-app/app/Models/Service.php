<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    protected $fillable = [
        'title','description','category_id','unit_type','price_per_unit','sample_image_url','artist_id'
    ];
}
