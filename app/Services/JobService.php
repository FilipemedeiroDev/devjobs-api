<?php

namespace App\Services;

use App\Models\CreateJobRequest;

interface JobService
{
    public function getAllJobs();

    public function getJobById(int $id);

    public function publishJob(CreateJobRequest $jobRequest);
}