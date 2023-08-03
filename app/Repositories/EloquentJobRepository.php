<?php 

namespace App\Repositories;

use App\Repositories\JobRepository;
use App\Models\Job;

class EloquentJobRepository implements JobRepository
{
    public function getAllJobs()
    {
        return Job::all();
    }

    public function getJobById(int $id)
    {
        return Job::find($id);
    }
}