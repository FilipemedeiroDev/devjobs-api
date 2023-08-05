<?php

namespace App\Services;

use App\Repositories\JobRepository;
use App\Models\CreateJobRequest;

class DefaultJobService implements JobService
{
    public function __construct(private readonly JobRepository $repository)
    {
    }

    public function getAllJobs()
    {
        return $this->repository->getAllJobs();
    }

    public function getJobById(int $id)
    {
        return $this->repository->getJobById($id);
    }

    public function publishJob(CreateJobRequest $jobRequest)
    {
        return $this->repository->publishJob($jobRequest);
    }
}