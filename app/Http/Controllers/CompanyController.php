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
            'message' => 'successfully created company'
        ], 201);
    }

    public function updateCompany(Request $request, int $id)
    {
        $creationRequest = new CreateCompanyRequest($request);
        $userId = auth()->user()->getAuthIdentifier();

        $companyUpdated = $this->companyService->updateCompany($id, $userId, $creationRequest);

        return response()->json([
            'company' => $companyUpdated,
            'message' => 'successfully updated company'
        ], 200);
    }

    public function deleteCompany(Request $request, int $id) 
    {   
        $userId = auth()->user()->getAuthIdentifier();
        $this->companyService->deleteCompany($id, $userId);

        return response()->json([
            'message' => 'successfully deleted company'
        ], 200);
    }
}