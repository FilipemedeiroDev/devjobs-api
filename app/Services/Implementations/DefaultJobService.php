<?php

namespace App\Services\Implementations;

use App\Repositories\JobRepository;
use App\Models\Requests\CreateJobRequest;
use App\Services\JobService;
use App\Services\CompanyService;

class DefaultJobService implements JobService
{
    public function __construct(
        private readonly JobRepository $jobRepository,
        private readonly CompanyService $companyService
    ){ }

    public function getAllJobs()
    {
        return $this->jobRepository->getAllJobs();
    }

    public function getJobById(int $id)
    {
        return $this->jobRepository->getJobById($id);
    }

    public function publishJob(int $userId, CreateJobRequest $jobRequest)
    {
        $company = $this->companyService->findByIdAndUserId($jobRequest->getCompanyId(), $userId);

        if(!$company) {
            abort(404, 'Company not found');
        }

        return $this->jobRepository->publishJob($jobRequest);
    }
}