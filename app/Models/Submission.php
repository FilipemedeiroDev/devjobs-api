<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{


    protected $fillabe = [
        'user_id',
        'job_id',
        'status',
        'submitted_at'
    ];
};
