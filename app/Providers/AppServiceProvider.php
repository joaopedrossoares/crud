<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\CrudTest\Repositories\Contracts\ClientRepositoryInterface', 
            'App\CrudTest\Repositories\ClientRepository'
        );

      
        $this->app->bind(
            'App\CrudTest\Services\Contracts\ClientServiceInterface', 
            'App\CrudTest\Services\ClientService'
        );    

        $this->app->bind(
            'App\CrudTest\Services\Contracts\AddressServiceInterface', 
            'App\CrudTest\Services\AddressService'
        );

         $this->app->bind(
            'App\CrudTest\Repositories\Contracts\AddressRepositoryInterface', 
            'App\CrudTest\Repositories\AddressRepository'
        );

    }
}
