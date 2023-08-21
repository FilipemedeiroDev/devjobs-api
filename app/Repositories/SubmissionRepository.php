<?php

namespace App\Repositories;


interface SubmissionRepository
{
    public function findSubmissionByJobIdAndUserId(int $jobId, int $userId);

    public function createSubmission(int $jobId, int $userId);
}