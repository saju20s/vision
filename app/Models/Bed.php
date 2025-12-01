<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $fillable = [
        'bed_category',
        'bed_type',
        'floor_no',
        'room_no',
        'bed_no',
        'charge',
    ];

    public function admission()
    {
        return $this->hasOne(Admission::class, 'bed_id')->where('status', 'admitted');
    }
}
