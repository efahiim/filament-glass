<?php

namespace IMFE\FilamentGlass;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentGlassPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-glass';
    }

    public function register(Panel $panel): void
    {
        $panel->viteTheme('resources/css/filament/admin/theme.css');
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }
}