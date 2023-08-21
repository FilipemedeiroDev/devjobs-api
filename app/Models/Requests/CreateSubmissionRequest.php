<?php

namespace App\Models\Requests;


use Illuminate\Http\Request;

class CreateSubmissionRequest
{
        protected $job_id;


    public function __construct(Request $request)
    {
        $this->job_id = $request->input('job_id');
    }

    public function getJobId()
    {
        return $this->job_id;
    }


    public function toArray(): array
    {
        return [
            "job_id" => $this->job_id
        ];
    }
}