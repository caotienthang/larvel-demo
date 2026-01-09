<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function invoiceDetails() {
        return $this->hasMany(InvoiceDetail::class);
    }
    public function products()
    {
        return $this->belongsToMany(
            \App\Models\Product::class,
            'product_service'
        )->withTimestamps();
    }
}
