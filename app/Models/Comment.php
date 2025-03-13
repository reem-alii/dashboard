<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $fillable = [
        'comment',
        'product_id',
        'user_id'
    ];
    
    //protected $dateFormat = 'M d, Y';
    
    // public function setCreatedAtAttribute($timestamp)
    // {
    //     $this->attributes['created_at'] = Carbon::parse($timestamp)->format('%b %d, %Y');

    //     //$this->attributes['created_at'] = Carbon::createFromFormat('m/d/Y', $timestamp)->format('M d, Y');
    //     //$this->attributes['created_at'] = Carbon::parse($date)->format('M d, Y');
    // }
    public function getCreatedAtAttribute($timestamp)
    {
       return Carbon::parse($timestamp)->format('M d, Y');
    }

    // public function setUpdatedAt($date)
    // {

    //     $this->attributes['updated_at'] = Carbon::parse($date)->format('M d, Y');
    // }
    

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    
}
