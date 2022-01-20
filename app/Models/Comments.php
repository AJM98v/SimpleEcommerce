<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','text','product_id'];

    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
