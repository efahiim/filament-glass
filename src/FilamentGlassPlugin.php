<?php

namespace IMFE\FilamentGlass;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentGlassPlugin implements Plugin
{
    protected bool $shouldPublishAssets = true;

    public function getId(): string
    {
        return 'filament-glass';
    }

    public function register(Panel $panel): void
    {
        $panel->viteTheme('resources/css/filament/glass/theme.css');
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public function publishAssets(bool $condition = true): static
    {
        $this->shouldPublishAssets = $condition;
        return $this;
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