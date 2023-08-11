<?php

namespace App\Models\Requests;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateCompanyRequest
{
        protected $owner_id;
        protected $short_name;
        protected $full_name;
        protected $photo_url;
        protected $country_code;
        protected $state;
        protected $city;
        protected $status;
        protected $created_at;
        protected $updated_at;

    public function __construct(Request $request)
    {
        $this->owner_id = $request->input('owner_id');
        $this->short_name = $request->input('short_name');
        $this->full_name = $request->input('full_name');
        $this->photo_url = $request->input('photo_url');
        $this->country_code = $request->input('country_code');
        $this->state = $request->input('state');
        $this->city = $request->input('city');
        $this->status = 'ENABLED';

        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();

    }

    public function toArray(): array
    {
        return [
            "owner_id" => $this->owner_id,
            "short_name" => $this->short_name,
            "full_name" => $this->full_name,
            "photo_url" => $this->photo_url,
            "country_code" => $this->country_code,
            "state" => $this->state,
            "city" => $this->city,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}