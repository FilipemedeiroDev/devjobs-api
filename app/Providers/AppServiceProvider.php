<?php

namespace App\Providers;

use App\Services\Implementations\DefaultJobService;
use App\Services\Implementations\DefaultUserService;
use App\Services\Implementations\DefaultCompanyService;
use App\Services\JobService;
use App\Services\UserService;
use App\Services\CompanyService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JobService::class, DefaultJobService::class);
        $this->app->bind(UserService::class, DefaultUserService::class);
        $this->app->bind(CompanyService::class, DefaultCompanyService::class);
    }
}