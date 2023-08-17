<?php

namespace App\Services;

use App\Models\Requests\CreateCompanyRequest;

interface CompanyService
{
    public function findById(int $id);

    public function findByIdAndUserId(int $id, int $userId);

    public function findAllByUserId(int $userId);

    public function createCompany(int $userId, CreateCompanyRequest $companyRequest);

    public function updateCompany(int $id, int $userId, CreateCompanyRequest $companyRequest);

    public function deleteCompany(int $id, int $userId);
}
