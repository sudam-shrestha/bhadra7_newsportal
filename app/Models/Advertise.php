<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $fillable = [
        'company_name',
        'contact_no',
        'banner',
        'redirect_link',
        'expire_date',
    ];

    protected $casts = [
        'expire_date' => 'date',
    ];
}
