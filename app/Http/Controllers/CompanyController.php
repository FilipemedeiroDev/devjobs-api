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
        $company = $this->companyService->findById($id);

        return response()->json($company);
    }


    public function findAllByUserId()
    {
        $userId = auth()->user()->getAuthIdentifier();

        $companies = $this->companyService->findAllByUserId($userId);

        return response()->json($companies);
    }

    public function createCompany(Request $request)
    {
        $creationRequest = new CreateCompanyRequest($request);
        $userId = auth()->user()->getAuthIdentifier();

        $company = $this->companyService->createCompany($userId, $creationRequest);

        return response()->json([
            'company' => $company,
            'message' => 'CREATED'
        ], 201);
    }
}