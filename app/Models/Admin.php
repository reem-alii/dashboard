<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

        protected $fillable = [
            'first_name',
            'last_name',
            'email',
            'password',
            'image',
            'phone',
        ];
    
        
        protected $hidden = [
            'password',
            'remember_token',
        ];
    
        
        protected $casts = [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
