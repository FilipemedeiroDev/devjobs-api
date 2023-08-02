<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{


    protected $fillable = [
        'owner_id',
        'short_name',
        'full_name',
        'photo_url',
        'country_code',
        'state',
        'city',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
