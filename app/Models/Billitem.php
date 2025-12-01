<?php

namespace App\Models;

use App\Models\Bill;
use App\Models\Investigation;
use Illuminate\Database\Eloquent\Model;

class Billitem extends Model
{
    protected $fillable = [
        'bill_id',
        'investigation_id',
        'price',
        'quantity',
        'discount',
        'discount_amount',
        'total',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function investigation()
    {
        return $this->belongsTo(Investigation::class, 'investigation_id');
    }
}
