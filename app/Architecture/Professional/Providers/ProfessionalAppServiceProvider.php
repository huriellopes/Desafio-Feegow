<?php

namespace App\Architecture\Professional\Providers;

use App\Architecture\Professional\Interfaces\IProfessionalService;
use App\Architecture\Professional\Services\ProfessionalService;
use Illuminate\Support\ServiceProvider;

class ProfessionalAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IProfessionalService::class,
            ProfessionalService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
