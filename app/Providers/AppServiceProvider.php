<?php

namespace App\Providers;

use App\Services\DefaultJobService;
use App\Services\JobService;
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
    }
}
