<?php

namespace ThangNT\HelloWorldPackage\Providers;

use Illuminate\Support\ServiceProvider;

class HelloWorldPackageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $package_name = "hello-world-package";

        //routes
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');

        //view
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', $package_name);
        $this->publishes([
                __DIR__.'/../Resources/Views' => resource_path('views/vendor/' . $package_name),
            ]);

        //migrations
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        /*
        |--------------------------------------------------------------------------
        | Route Providers need on boot() method, others can be in register() method
        |--------------------------------------------------------------------------
        */
        $this->app->register(RouteServiceProvider::class);

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        // // Binding DI
        // $this->app->bind(BookRepositoryContract::class, BookRepository::class);
        // $this->app->bind(BookServiceContract::class, BookService::class);


    }
}
