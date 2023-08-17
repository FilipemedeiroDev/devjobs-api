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
        $company = $this->companyRepository->findById($id);

        if(!$company) {
            abort(404, 'Company not found');
        }

        return $company;
    }

    public function findByIdAndUserId(int $id, int $userId)
    {
        return $this->companyRepository->findByIdAndUserId($id, $userId);
    }

    public function findAllByUserId(int $userId)
    {
        return $this->companyRepository->findAllByUserId($userId);
    }

    public function createCompany(int $userId, CreateCompanyRequest $companyRequest)
    {
        return $this->companyRepository->createCompany($userId, $companyRequest);
    }

    public function updateCompany(int $id, int $userId, createCompanyRequest $companyRequest)
    {
        $companyToUpdate = $this->findByIdAndUserId($id, $userId);

        if(!$companyToUpdate) {
            abort(404, 'Company not found');
        }

        return $this->companyRepository->updateCompany($id, $userId, $companyRequest, $companyToUpdate);
    }


}
