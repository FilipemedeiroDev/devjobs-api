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
        $job = $this->jobRepository->getJobById($id);

        if(!$job) {
            abort(404, 'Job not found');
        }

        return $job;
    }

    public function publishJob(int $userId, CreateJobRequest $jobRequest)
    {
        $company = $this->companyService->findByIdAndUserId($jobRequest->getCompanyId(), $userId);

        if(!$company) {
            abort(404, 'Company not found');
        }

        return $this->jobRepository->publishJob($jobRequest);
    }

    public function updateJob(int $id, int $userId, CreateJobRequest $jobRequest)
    {
         $jobToUpdate = $this->getJobById($id);
         $companyAuthenticated = $this->companyService->findByIdAndUserId($jobRequest->getCompanyId(), $userId);

         if(!$companyAuthenticated) {
            abort(401, 'you do not have permission to edit this vacancy');
         }

        return $this->jobRepository->updateJob($jobRequest, $jobToUpdate);
    }

    public function deleteJob(int $id, int $userId)
    {
         $jobToDelete = $this->getJobById($id);
         $companyAuthenticated = $this->companyService->findByIdAndUserId($jobToDelete->company_id, $userId);

         if($jobToDelete->company_id !== $companyAuthenticated->id) {
            abort(400, 'this operation could not be performed');
         }

         return $this->jobRepository->deleteJob($jobToDelete);
    }
}