<?php

namespace App\Repositories;

use App\Models\Requests\CreateJobRequest;
use App\Models\Job;

interface JobRepository
{
    public function getAllJobs();

    public function getJobById(int $id);

    public function publishJob(CreateJobRequest $jobRequest);

    public function updateJob(CreateJobRequest $jobRequest, Job $jobUpdated);

    public function deleteJob(Job $jobDeleted);
}