<?php

namespace App\Repositories\Implementations;

use App\Repositories\JobRepository;
use App\Models\Job;
use App\Models\Requests\CreateJobRequest;

class EloquentJobRepository implements JobRepository
{
    public function getAllJobs()
    {
        return Job::all();
    }

    public function getJobById(int $id)
    {
        return Job::find($id);
    }

    public function publishJob(CreateJobRequest $jobRequest)
    {
        $newJob = new Job();
        $newJob->fill($jobRequest->toArray());

        $newJob->save();

        return $newJob;
    }

    public function updateJob(CreateJobRequest $jobRequest, Job $jobUpdated)
    {
        $jobUpdated->fill($jobRequest->toArray());
        $jobUpdated->save();

        return $jobUpdated;
    }

    public function  deleteJob(Job $jobDeleted)
    {
        return Job::destroy($jobDeleted->id);
    }

}