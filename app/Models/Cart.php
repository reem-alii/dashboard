<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\UserScope;


class Cart extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserScope());
    }
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_quantity',
        'price', 
        'total_price',
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
