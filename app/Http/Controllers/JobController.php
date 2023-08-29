<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use App\Models\Requests\CreateJobRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function __construct(private readonly JobService $jobService)
    {
    }

    public function getAllJobs()
    {
        $jobs =  $this->jobService->getAllJobs();

        return response()->json([
            'jobs' => $jobs,
        ],200);
    }

    public function getJobById(Request $request, $id)
    {
        return $this->jobService->getJobById($id);
    }

    public function publishJob(Request $request)
    {
        $creationRequest = new CreateJobRequest($request);
        $userId = auth()->user()->getAuthIdentifier();

        $job = $this->jobService->publishJob($userId, $creationRequest);

        return response()->json([
            'job' => $job,
            'message' => 'successfully created Job'
        ], 201);
    }

    public function updateJob(Request $request, $id)
    {
        $creationRequest = new CreateJobRequest($request);
        $userId = auth()->user()->getAuthIdentifier();

        $jobUpdated = $this->jobService->updateJob($id, $userId, $creationRequest);

        return response()->json([
            'job' => $jobUpdated,
            'message' => 'successfully updated Job'
        ], 200);
    }

    public function deleteJob(Request $request, $id)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $this->jobService->deleteJob($id, $userId);

        return response()->json([
            'message' => 'successfully deleted Job'
        ], 200);
    }
}