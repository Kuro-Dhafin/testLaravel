<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PriceReference extends Model {
    protected $fillable = ['category_id','level','unit','price_min','price_max','currency','description'];
}
