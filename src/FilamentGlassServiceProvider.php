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
        // Publish views so they override Filament's default views
        $this->publishes([
            $this->package->basePath('/../resources/views') => resource_path('views/vendor/filament-panels/components'),
        ], "{$this->package->shortName()}-views");

        // Publish CSS for Tailwind 4 compilation
        $this->publishes([
            $this->package->basePath('/../resources/css/theme.css') => resource_path('css/filament/glass/theme.css'),
        ], "{$this->package->shortName()}-assets");
    }

    public function packageRegistered(): void
    {
        //
    }
}