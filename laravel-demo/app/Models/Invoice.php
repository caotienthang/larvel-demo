<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
                            'user_id',
                            'address',
                            'total',
                        ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function details() {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id');
    }
}
