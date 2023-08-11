<?php

namespace App\Services\Implementations;

use App\Repositories\CompanyRepository;
use App\Models\Requests\CreateCompanyRequest;
use App\Services\CompanyService;

class DefaultCompanyService implements CompanyService
{
    public function __construct(private readonly CompanyRepository $companyRepository)
    {
    }

    public function findById(int $id)
    {
        return $this->companyRepository->findById($id);
    }

    public function findByIdAndUserId(int $id, int $userId)
    {
        return $this->companyRepository->findByIdAndUserId($id, $userId);
    }

    public function createCompany(CreateCompanyRequest $companyRequest)
    {
        $userId = auth()->user()->getAuthIdentifier();

        return $this->companyRepository->createCompany($userId, $companyRequest);
    }
}