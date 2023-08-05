<?php

namespace App\Repositories;

use App\Models\CreateJobRequest;

interface JobRepository
{
    public function getAllJobs();

    public function getJobById(int $id);

    public function publishJob(CreateJobRequest $jobRequest);
}