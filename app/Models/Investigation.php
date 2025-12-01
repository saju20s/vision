<?php

namespace App\Models;

use App\Models\Report;
use App\Models\Billitem;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    protected $fillable = [
        'test_name',
        'department',
        'buy_price',
        'sell_price',
        'test_form',
        'xray_form',
        'usg_form',
        'test_category_name',
    ];

    protected $casts = [
        'test_form' => 'array',
        'xray_form' => 'array',
        'usg_form' => 'array',
    ];

    public function billItems()
    {
        return $this->hasMany(Billitem::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
