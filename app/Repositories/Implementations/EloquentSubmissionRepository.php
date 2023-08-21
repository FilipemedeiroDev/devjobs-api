<?php

namespace App\Repositories\Implementations;

use App\Repositories\SubmissionRepository;
use App\Models\Submission;
use App\Models\Requests\CreateSubmissionRequest;
use Carbon\Carbon;

class EloquentSubmissionRepository implements SubmissionRepository
{

    public function findSubmissionByJobIdAndUserId(int $jobId, int $userId)
    {
        $submission = Submission::where([
            'job_id' => $jobId,
            'user_id' => $userId
        ])->first();

        return $submission;
    }

    public function createSubmission(int $jobId, int $userId)
    {
        $newSubmission = new Submission();
        $newSubmission->fill([
            "user_id" => $userId,
            "job_id" => $jobId,
            "submitted_at" => Carbon::now()
        ]);

        $newSubmission->save();

        return $newSubmission;
    }
}