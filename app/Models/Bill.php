<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Report;
use App\Models\Patient;
use App\Models\Billitem;
use App\Models\Marketing;
use App\Models\Investigation;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected static function booted()
    {
        static::creating(function ($bill) {
            $now = now();
            $bill->created_at = $now;
            $bill->updated_at = $now;
        });
    }

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'marketing_id',
        'invoice_number',
        'total_amount',
        'discount',
        'discount_type',
        'vat',
        'vat_type',
        'doctor_commision_type',
        'marketing_commision_type',
        'doctor_commision',
        'marketing_commision',
        'paid_amount',
        'due_amount',
        'entry_by',
        'payment',
        'status',
        'delivery_date',
        'note',
        'labtolab'
    ];

    protected $casts = [
        'payment' => 'array',
    ];

    // Bill belongs to a Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function marketing()
    {
        return $this->belongsTo(Marketing::class);
    }

    // Bill has many BillItems (Investigation list)
    public function items()
    {
        return $this->hasMany(Billitem::class, 'bill_id');
    }

    // Bill has many Reports
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }

    // সব বিলের total income
    public static function totalIncome()
    {
        return self::sum('total_amount');
    }

    // সব expense
    public static function totalExpense()
    {
        return Expense::sum('amount');
    }

    // profit calculation
    public static function netProfit()
    {
        return self::totalIncome() - self::totalExpense();
    }

    // App\Models\Bill.php

    public function checkAndUpdateStatus()
    {
        $investigationIds = Billitem::where('bill_id', $this->id)
            ->pluck('investigation_id')
            ->unique();

        $investigationIds = Investigation::whereIn('id', $investigationIds)
            ->whereNotIn('department', ['accessories', 'surgery_charge'])
            ->pluck('id');

        // report count
        $reportCount = Report::where('bill_id', $this->id)
            ->whereIn('investigation_id', $investigationIds)
            ->count();

        if ($reportCount === $investigationIds->count()) {
            $this->status = 'complete';
            $this->save();
        }
    }
}
