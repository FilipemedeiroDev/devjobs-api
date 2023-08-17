<?php

namespace App\Repositories;

use App\Models\Requests\createCompanyRequest;
use App\Models\Company;

interface CompanyRepository
{
    public function findById(int $id);

    public function findByIdAndUserId(int $id, int $userId);

    public function findAllByUserId(int $userId);

    public function createCompany(int $userId, CreateCompanyRequest $companyRequest);

    public function updateCompany(int $id, int $userId, CreateCompanyRequest $companyRequest, Company $companyUpdated);
}