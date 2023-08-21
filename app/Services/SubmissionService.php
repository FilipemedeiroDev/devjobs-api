<?php

namespace App\Services;

use App\Models\Requests\CreateSubmissionRequest;

interface SubmissionService
{
    public function findSubmissionByJobIdAndUserId(int $jobId, int $userId);

    public function getAllSubmissionByUserId(int $userId);

    public function createSubmission(CreateSubmissionRequest $submissionRequest, int $userId);
}