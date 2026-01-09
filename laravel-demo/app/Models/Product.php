<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image', 'description','hot_sale'];
    protected $casts = [
        'hot_sale' => 'boolean',
    ];
    public function services()
    {
        return $this->belongsToMany(
            \App\Models\Service::class,
            'product_service'
        )->withTimestamps();
    }
}
