<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\UserScope;
use Carbon\Carbon;


class Order extends Model
{
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserScope());
    }
    public function getCreatedAtAttribute($timestamp)
    {
       return Carbon::parse($timestamp)->format('Y-m-d');
    }

    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'address',
        'quantity',
        'total_cost',
        'order_number'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order_items(){
        return $this->hasMany(Order_Items::class);
    }
}
