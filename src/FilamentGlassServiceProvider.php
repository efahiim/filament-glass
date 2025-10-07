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
            ->hasViews('filament-glass');
    }
    
    public function packageRegistered(): void
    {
        // Load views from the package for Livewire components
        $this->loadViewsFrom($this->package->basePath('/../resources/views'), 'filament-glass');
    }

    public function packageBooted(): void
    {
        // Publish ONLY the regular blade component views to filament-panels vendor directory
        $this->publishes([
            $this->package->basePath('/../resources/views/components/layout') => resource_path('views/vendor/filament-panels/components/layout'),
            $this->package->basePath('/../resources/views/components/sidebar') => resource_path('views/vendor/filament-panels/components/sidebar'),
        ], 'filament-glass-views');

        // Publish CSS assets
        $this->publishes([
            $this->package->basePath('/../resources/css/filament/admin/theme.css') => resource_path('css/filament/admin/theme.css'),
        ], 'filament-glass-assets');
        
        // Optionally allow users to publish the livewire views if they want to customize them
        $this->publishes([
            $this->package->basePath('/../resources/views/livewire') => resource_path('views/vendor/filament-glass/livewire'),
        ], 'filament-glass-livewire-views');
    }
}