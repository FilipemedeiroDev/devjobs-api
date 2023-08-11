<?php

namespace App\Models\Requests;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateUserRequest
{

    protected $first_name;
    protected $last_name;
    protected $email;
    protected $role;
    protected $country_code;
    protected $state;
    protected $city;
    protected $address;
    protected $neighborhood;
    protected $address_number;
    protected $avatar_url;
    protected $bio;
    protected $curriculum_url;
    protected $password;
    protected $created_at;
    protected $updated_at;

    public function __construct(Request $request)
    {

        $this->first_name = $request->input('first_name');
        $this->last_name = $request->input('last_name');
        $this->email = $request->input('email');
        $this->role = $request->input('role');
        $this->country_code = $request->input('country_code');
        $this->state = $request->input('state');
        $this->city = $request->input('city');
        $this->address = $request->input('address');
        $this->neighborhood = $request->input('neighborhood');
        $this->address_number = $request->input('address_number');
        $this->avatar_url = $request->input('avatar_url');
        $this->bio = $request->input('bio');
        $this->curriculum_url = $request->input('curriculum_url');
        $this->password = $request->input('password');

        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [

            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "country_code" => $this->country_code,
            "role" => $this->role,
            "state" => $this->state,
            "city" => $this->city,
            "address" => $this->address,
            "neighborhood" => $this->neighborhood,
            "address_number" => $this->address_number,
            "avatar_url" => $this->avatar_url,
            "bio" => $this->bio,
            "curriculum_url" => $this->curriculum_url,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}