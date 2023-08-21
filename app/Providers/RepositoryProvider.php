<?php

namespace App\Providers;

use App\Repositories\Implementations\EloquentJobRepository;
use App\Repositories\Implementations\EloquentUserRepository;
use App\Repositories\Implementations\EloquentCompanyRepository;
use App\Repositories\Implementations\EloquentSubmissionRepository;
use App\Repositories\JobRepository;
use App\Repositories\UserRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\SubmissionRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JobRepository::class, EloquentJobRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(CompanyRepository::class, EloquentCompanyRepository::class);
        $this->app->bind(SubmissionRepository::class, EloquentSubmissionRepository::class);
    }
}