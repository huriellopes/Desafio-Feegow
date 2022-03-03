<?php

namespace App\Architecture\Schedule\Providers;

use App\Architecture\Schedule\Interfaces\IScheduleRepository;
use App\Architecture\Schedule\Interfaces\IScheduleService;
use App\Architecture\Schedule\Repositories\ScheduleRepository;
use App\Architecture\Schedule\Services\ScheduleService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ScheduleAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IScheduleRepository::class,
            ScheduleRepository::class
        );

        $this->app->singleton(
            IScheduleService::class,
            ScheduleService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validacpf', 'App\Rules\Cpf@passes', 'O cpf informado é inválido.');
    }
}
