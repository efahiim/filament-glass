<?php

namespace IMFE\FilamentGlass;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentGlassServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-glass';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }

    public function packageBooted(): void
    {
        $this->publishes([
            $this->package->basePath('/../resources/views/components/layout') => resource_path('views/vendor/filament-panels/components/layout'),
            $this->package->basePath('/../resources/views/components/livewire') => resource_path('views/vendor/filament-panels/components/livewire'),
            $this->package->basePath('/../resources/views/components/sidebar') => resource_path('views/vendor/filament-panels/components/sidebar'),
        ], "{$this->package->shortName()}-views");

        $this->publishes([
            $this->package->basePath('/../resources/css/filament/admin/theme.css') => resource_path('css/filament/admin/theme.css'),
        ], "{$this->package->shortName()}-assets");
    }
}