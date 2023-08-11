<?php

namespace App\Services;

use App\Models\Requests\CreateCompanyRequest;

interface CompanyService
{
    public function findById(int $id);

    public function findByIdAndUserId(int $id, int $userId);

    public function createCompany(CreateCompanyRequest $companyRequest);
}