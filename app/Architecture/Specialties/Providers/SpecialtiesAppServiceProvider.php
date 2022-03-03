<?php

namespace App\Architecture\Specialties\Providers;

use App\Architecture\Specialties\Interfaces\ISpecialityService;
use App\Architecture\Specialties\Services\SpecialityService;
use Illuminate\Support\ServiceProvider;

class SpecialtiesAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ISpecialityService::class,
            SpecialityService::class
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
