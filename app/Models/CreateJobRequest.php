<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateJobRequest
{
    protected $headline;
    protected $company_id;
    protected $description;
    protected $requirements;
    protected $status;
    protected $routine;
    protected $location;
    protected $tags;
    protected $published_at;
    protected $updated_at;

    public function __construct(Request $request)
    {
        $this->headline = $request->input('headline');
        $this->company_id = $request->input('company_id');
        $this->description = $request->input('description');
        $this->requirements = $request->input('requirements');
        $this->status = $request->input('status');
        $this->routine = $request->input('routine');
        $this->location = $request->input('location');
        $this->tags = $request->input('tags');

        $this->published_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }

    public function toArray(): array
    {
        return [
            "headline" => $this->headline,
            "company_id" => $this->company_id,
            "description" => $this->description,
            "requirements" => $this->requirements,
            "status" => $this->status,
            "routine" => $this->routine,
            "location" => $this->location,
            "tags" => $this->tags,
            "published_at" => $this->published_at,
            "updated_at" => $this->updated_at
        ];
    }
}