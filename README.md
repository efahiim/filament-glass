# Filament Glass

A beautiful glass-morphism inspired theme for Filament 4 with enhanced sidebar styling and modern aesthetics.

![Filament Version](https://img.shields.io/badge/Filament-4.x-orange)
![Tailwind Version](https://img.shields.io/badge/Tailwind-4.x-38bdf8)
![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777BB4)
![Laravel Version](https://img.shields.io/badge/Laravel-12.x-FF2D20)

## Requirements

- PHP 8.2 or higher
- Laravel 12 or higher
- Filament 4.x
- Tailwind CSS 4.x
- Node.js 18+ and npm

---

## Installation

### Step 1: Install the Package

```bash
composer require imfe/filament-glass
```

### Step 2: Publish Assets

Publish the theme views and CSS:
```bash
# Publish views (overrides default Filament layout components)
php artisan vendor:publish --tag="filament-glass-views"

# Publish CSS (for Tailwind compilation)
php artisan vendor:publish --tag="filament-glass-assets"
```

### Step 3: Configure Vite

Add the theme CSS to your vite.config.js:
```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css', // Add this line
            ],
            refresh: true,
        }),
    ],
});
```

### Step 4: Configure Your Panel

In your Filament panel provider (e.g., app/Providers/Filament/AdminPanelProvider.php):
```php
use Filament\Support\Colors\Color;
use IMFE\FilamentGlass\FilamentGlassPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->default()
        ->id('admin')
        ->path('admin')
        // Register the theme plugin
        ->plugin(FilamentGlassPlugin::make())
        
        // Set your favicon (adjusts path based on environment)
        ->favicon($this->app->environment('production') ? secure_asset('favicon.png') : asset('favicon.png'))
        
        // Set your brand logo (adjusts path based on environment)
        ->brandLogo($this->app->environment('production') ? secure_asset('images/logo.svg') : asset('images/logo.svg'))
        
        // Set logo height
        ->brandLogoHeight('2.5rem')
        
        // Set your application name
        ->brandName('App Name')
        
        // Set your primary theme color (customize this to match your brand)
        ->colors([
            'primary' => Color::hex('#A9871C'),
        ]);
}
```

### Step 5: Build Assets

```bash
# Install dependencies (if not already installed)
npm install

# Build for production
npm run build

# OR run development server with hot reload
npm run dev
```