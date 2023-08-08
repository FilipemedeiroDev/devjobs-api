<?php

namespace App\Services;

use App\Repositories\JobRepository;
use App\Models\CreateJobRequest;

class DefaultJobService implements JobService
{
    public function __construct(private readonly JobRepository $jobRepository)
    {
    }

    public function getAllJobs()
    {
        return $this->jobRepository->getAllJobs();
    }

    public function getJobById(int $id)
    {
        return $this->jobRepository->getJobById($id);
    }

    public function publishJob(CreateJobRequest $jobRequest)
    {
        return $this->jobRepository->publishJob($jobRequest);
    }
}
