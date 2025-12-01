<?php

namespace App\Models;

use App\Models\Bill;
use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Patient extends Model
{
     protected $fillable = ['name', 'gender', 'date_of_birth', 'phone', 'address', 'patient_id', 'type', 'image'];

     protected $dates = ['date_of_birth'];

     public function getAgeAttribute()
     {
          return $this->date_of_birth
               ? Carbon::parse($this->date_of_birth)->age
               : null;
     }

     public function getFullAgeAttribute()
     {
          if (!$this->date_of_birth) {
               return null;
          }

          $dob = Carbon::parse($this->date_of_birth);
          $now = Carbon::now();
          $years = (int) $dob->diffInYears($now);
          $months = (int) $dob->copy()->addYears($years)->diffInMonths($now);
          $days = (int) $dob->copy()->addYears($years)->addMonths($months)->diffInDays($now);
          return "{$years} Year(s) {$months} Month(s) {$days} Day(s)";
     }


     public function bills()
     {
          return $this->hasMany(Bill::class);
     }

    

     public function reports()
     {
          return $this->hasMany(Report::class);
     }
}
