<?php

namespace Darvis\ModuleDocument;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Livewire\Livewire;
use Darvis\ModuleDocument\Livewire\Document\DocumentListRow;
use Darvis\ModuleDocument\Livewire\Documentcat\DocumentcatListRow;
use function config_path;
use function resource_path;
use function database_path;

class DocumentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register config
        $this->mergeConfigFrom(
            __DIR__ . '/config/module_document.php', 'module_document'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'module-document');

        // Register Livewire Components
        Livewire::component('manta.document.document-list-row', DocumentListRow::class);
        Livewire::component('manta.documentcat.documentcat-list-row', DocumentcatListRow::class);

        // Publish config
        $this->publishes([
            __DIR__ . '/config/module_document.php' => config_path('module_document.php'),
        ], 'config');

        // Publish views
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/module-document'),
        ], 'views');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}
