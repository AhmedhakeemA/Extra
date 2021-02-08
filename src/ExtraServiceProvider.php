<?php

namespace Hakeem\Extra;

use Hakeem\Extra\Commands\ClassGenerator;
use Hakeem\Extra\Commands\InterfaceGenerator;
use Illuminate\Support\ServiceProvider;
use Hakeem\Extra\Commands\RepositoryPattern;
use Hakeem\Extra\Commands\TraitGenerator;

class ExtraServiceProvider extends ServiceProvider
{
    /**
     * Register extra services.
     *
     * @return void
     */
    public function register()
    {

        $this->loadViewsFrom(__DIR__ . '/resources/stubs', 'RepositoryPattern');

        $this->publishes([
            __DIR__ . '/resources/stubs' => resource_path('/extra/stubs')
        ]);
    }

    /**
     * Bootstrap  extra services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            RepositoryPattern::class,
            ClassGenerator::class,
            InterfaceGenerator::class,
            TraitGenerator::class
        ]);
    }
}
