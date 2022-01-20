<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[
      'product_name',
      'product_price',
      'quantity','user_id','product_id'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
