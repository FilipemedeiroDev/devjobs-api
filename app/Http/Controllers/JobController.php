<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Illuminate\Http\Client\Request;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private readonly JobService $jobService) { }

    public function getAllJobs()
    {
        return $this->jobService->getAllJobs();
    }

    public function getJobById(Request $request, $id)
    {
        return $this->jobService->getJobById($id);
    }

    
}
