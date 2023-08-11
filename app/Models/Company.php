<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{


    protected $fillable = [
        'owner_id',
        'short_name',
        'full_name',
        'photo_url',
        'country_code',
        'state',
        'city',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}