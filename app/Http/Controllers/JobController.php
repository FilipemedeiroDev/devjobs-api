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
        return $this->jobService->getAllJobs();
    }

    public function getJobById(Request $request, $id)
    {
        return $this->jobService->getJobById($id);
    }

    public function publishJob(Request $request)
    {

        $creationRequest = new CreateJobRequest($request);

        $job = $this->jobService->publishJob($creationRequest);

        return response()->json([
            'job' => $job,
            'message' => 'CREATED'
        ], 201);
    }
}