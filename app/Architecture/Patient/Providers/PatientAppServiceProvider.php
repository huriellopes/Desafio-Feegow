<?php

namespace App\Architecture\Patient\Providers;

use App\Architecture\Patient\Interfaces\IPatientService;
use App\Architecture\Patient\Services\PatientService;
use Illuminate\Support\ServiceProvider;

class PatientAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IPatientService::class,
            PatientService::class
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
