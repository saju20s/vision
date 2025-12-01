<?php

namespace App\Models;

use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['name','expense_category_id', 'amount', 'date', 'note', 'entry_by'];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
