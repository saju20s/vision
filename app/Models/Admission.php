<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'patient_id',
        'admission_id',
        'bed_id',
        'admit_date',
        'discharge_date',
        'is_occupied',
        'bill_id',
        'prepared_by',
        'ot_consent',
        'status',
    ];

    protected $casts = [
        'bill_id' => 'array',
        'ot_consent' => 'array',
        'admit_date' => 'datetime',
        'discharge_date' => 'datetime',
    ];

    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'prepared_by');
    }
}
