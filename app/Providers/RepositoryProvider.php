<?php

namespace App\Providers;

use App\Repositories\EloquentJobRepository;
use App\Repositories\JobRepository;
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
    }
}