<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Models\Requests\CreateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(private readonly CompanyService $companyService)
    {
    }


    public function findById(int $id)
    {

    }

    public function findByIdAndUserId(int $id, int $userId)
    {

    }

    public function createCompany(Request $request)
    {
        $creationRequest = new CreateCompanyRequest($request);

        $company = $this->companyService->createCompany($creationRequest);

        return response()->json([
            'company' => $company,
            'message' => 'CREATED'
        ], 201);
    }
}