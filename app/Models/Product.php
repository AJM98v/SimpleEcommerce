<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Product extends Model
{

//    use SortableTrait;
    use Sluggable;
    use HasFactory;

//    public $sortable = [
//        'order_column_name' => 'order_column',
//        'sort_when_creating' => true,
//    ];

    protected $fillable = [
        'title',
        'price', 'info', 'description',
        'slug',
        'image', 'views', 'likes','user_id','sell'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function Category(){
        return $this->belongsToMany(Category::class);
    }
    public function tag(){
        return $this->belongsToMany(Tag::class,'tag_product');
    }
    public function Comments(){
        return $this->hasMany(Comments::class,);
    }
    public function Slides(){
        return $this->hasMany(ImageSlider::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Order(){
        return $this->hasMany(Order::class);
    }





}
