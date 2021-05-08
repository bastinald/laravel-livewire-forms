<?php

namespace Bastinald\LaravelLivewireForms\Providers;

use Bastinald\LaravelLivewireForms\Commands\MakeFormCommand;
use Illuminate\Support\ServiceProvider;

class LaravelLivewireFormsProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFormCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../../views', 'laravel-livewire-forms');

        $this->publishes([
            __DIR__ . '/../../views' => resource_path('views/vendor/laravel-livewire-forms'),
        ]);
    }
}
