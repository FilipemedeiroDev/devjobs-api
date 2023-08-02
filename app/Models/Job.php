<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{


    protected $fillable = [
        'company_id',
        'headline',
        'description',
        'requirements',
        'status',
        'routine',
        'location',
        'tags'
    ];

    protected $hidden = [
        'published_at',
        'updated_at',
    ];
}
