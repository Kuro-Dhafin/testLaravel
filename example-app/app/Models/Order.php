<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['buyer_id','service_id','quantity','total_price','status'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function buyer() {
        return $this->belongsTo(User::class,'buyer_id');
    }
}
