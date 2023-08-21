<?php

namespace App\Http\Controllers;

use App\Services\SubmissionService;
use App\Models\Requests\CreateSubmissionRequest;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function __construct(private readonly SubmissionService $submissionService)
    {
    }


    public function createSubmission(Request $request)
    {
        $creationRequest = new CreateSubmissionRequest($request);
        $userId = auth()->user()->getAuthIdentifier();

        $submission = $this->submissionService->createSubmission($creationRequest, $userId);

        return response()->json([
            'submission' => $submission,
            'message' => 'successfully submited job'
        ], 201);
    }
}