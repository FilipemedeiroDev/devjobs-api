<?php

namespace App\Services;

use App\Models\Requests\CreateJobRequest;

interface JobService
{
    public function getAllJobs();

    public function getJobById(int $id);

    public function publishJob(int $userId, CreateJobRequest $jobRequest);
}