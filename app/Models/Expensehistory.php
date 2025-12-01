<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expensehistory extends Model
{
    protected static function booted()
    {
        static::creating(function ($expense) {
            $now = now();
            $expense->created_at = $now;
            $expense->updated_at = $now;
        });
    }


    protected $fillable = [
        'expense_id',
        'expense_category_id',
        'amount',
        'name',
        'date',
        'note',
        'entry_by',
    ];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
