<?php

namespace App\Services\Implementations;

use App\Services\SubmissionService;
use App\Repositories\SubmissionRepository;
use App\Services\JobService;
use App\Models\Requests\CreateSubmissionRequest;

class DefaultSubmissionService implements SubmissionService
{
    public function __construct(
        private readonly SubmissionRepository $submissionRepository,
        private readonly JobService $jobService
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

        return $this->submissionRepository->createSubmission($job->id, $userId);
    }
}