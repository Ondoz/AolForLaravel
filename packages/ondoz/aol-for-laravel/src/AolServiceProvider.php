<?php

namespace ondoz\AolForLaravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class AolForLaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->offerPublishing();
    }

    protected function offerPublishing()
    {
        if (!function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/AccurateSet.php' => config_path('AccurateSet.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_aol_table.php.stub' => $this->getMigrationFileName('create_permission_tables.php'),
        ], 'migrations');
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @return string
     */
    protected function getMigrationFileName($migrationFileName): string
    {
        $timestamp = date('Y_m_d_His');

        $filesystem = $this->app->make(Filesystem::class);

        return Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem, $migrationFileName) {
                return $filesystem->glob($path . '*_' . $migrationFileName);
            })
            ->push($this->app->databasePath() . "/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}
