<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'prepared_by' => 'array',
        'authorized_by' => 'array',
        'commision' => 'array',
        'usg_signature' => 'array',
    ];
}
