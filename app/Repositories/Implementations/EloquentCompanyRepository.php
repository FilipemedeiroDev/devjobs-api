<?php

namespace App\Repositories\Implementations;

use App\Repositories\CompanyRepository;
use App\Models\Requests\CreateCompanyRequest;
use App\Models\Company;

class EloquentCompanyRepository implements CompanyRepository
{

    public function findById(int $id)
    {
        return Company::find($id);
    }

    public function findByIdAndUserId(int $id, int $userId)
    {
        $company = Company::where([
            'id' => $id,
            'owner_id' => $userId
        ])->first();

        return $company;
    }

    public function findAllByUserId(int $userId)
    {
        $company = Company::where(['owner_id' => $userId])->get();

        return $company;
    }

    public function createCompany(int $userId, CreateCompanyRequest $companyRequest)
    {
        $newCompany = new Company();
        $newCompany->fill($companyRequest->toArray());
        $newCompany->owner_id = $userId;

        $newCompany->save();

        return $newCompany;
    }

    public function updateCompany(int $userId,CreateCompanyRequest $companyRequest, Company $companyUpdated)
    {

        $companyUpdated->fill($companyRequest->toArray());
        $companyUpdated->owner_id = $userId;
        $companyUpdated->save();

        return $companyUpdated;
    }

    public function deleteCompany(Company $companyToDelete)
    {
        return  Company::destroy($companyToDelete->id);
    }
}