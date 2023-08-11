<?php

namespace App\Repositories;

use App\Models\Requests\createCompanyRequest;

interface CompanyRepository
{
    public function findById(int $id);

    public function findByIdAndUserId(int $id, int $userId);

    public function createCompany(int $userId, CreateCompanyRequest $companyRequest);
}