<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'bill_id',
        'investigation_id',
        'patient_id',
        'test_category_name',
        'test_form',
        'xray_form',
        'usg_form',
        'prepared_by',
        'authorized_by',
        'usg_signature',
        'report_signature',
        'delivered',
        'status', // pending / completed
    ];

    protected $casts = [
        'test_form' => 'array',
        'xray_form' => 'array',
        'usg_form' => 'array',
        'prepared_by' => 'array',
        'authorized_by' => 'array',
        'usg_signature' => 'array'
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
