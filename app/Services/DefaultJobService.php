<?php

namespace App\Services;

use App\Repositories\JobRepository;

class DefaultJobService implements JobService
{
    public function __construct(private readonly JobRepository $repository) { }

    public function getAllJobs()
    {
        return $this->repository->getAllJobs();
    }

    public function getJobById(int $id)
    {
        return $this->repository->getJobById($id);
    }
  
}

