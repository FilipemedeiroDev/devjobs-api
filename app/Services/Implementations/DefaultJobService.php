<?php

namespace App\Services\Implementations;

use App\Repositories\JobRepository;
use App\Models\Requests\CreateJobRequest;
use App\Services\JobService;

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