<?php

namespace App\Services\Implementations;

use App\Services\SubmissionService;
use App\Repositories\SubmissionRepository;
use App\Services\JobService;
use App\Models\Requests\CreateSubmissionRequest;
use App\Services\CompanyService;

class DefaultSubmissionService implements SubmissionService
{
    public function __construct(
        private readonly SubmissionRepository $submissionRepository,
        private readonly JobService $jobService,
        private readonly CompanyService $companyService
    ){ }

    public function findSubmissionByJobIdAndUserId(int $jobId, int $userId)
    {
        return $this->submissionRepository->findSubmissionByJobIdAndUserId($jobId, $userId);
    }

    public function getAllSubmissionByUserId(int $userId)
    {
        return $this->submissionRepository->getAllSubmissionByUserId($userId);
    }

    public function createSubmission(CreateSubmissionRequest $submissionRequest, int $userId)
    {
        $submissionExists = $this->findSubmissionByJobIdAndUserId($submissionRequest->getJobId(), $userId);

        if($submissionExists) {
            abort(422, 'You cannot apply twice on a job');
        }

        
        $job = $this->jobService->getJobById($submissionRequest->getJobId());

        if(!$job || $job->status !== 'ENABLED') {
            abort(404, 'Job not found');
        }

        $company = $this->companyService->findById($job->company_id);

        if($company->owner_id === $userId) {
            abort(422, 'you cannot apply for a job you created');
        }

        return $this->submissionRepository->createSubmission($job->id, $userId);
    }
}