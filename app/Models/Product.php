<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'size',
        'color',
        'image',
        'category_id',
        'admin_id',
        'Approve'
    ];
    public $translatable = [
        'name',
        'description',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function order_items(){
        return $this->hasMany(Order_Items::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
