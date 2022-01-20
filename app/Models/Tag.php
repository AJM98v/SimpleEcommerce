<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use const http\Client\Curl\PROXY_HTTP;

class Tag extends Model
{
    use HasFactory;
    protected $fillable =['title'];

    public function product(){
        return $this->belongsToMany(Product::class,'tag_products');
    }
}
