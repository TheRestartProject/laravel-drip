<?php
namespace wouterNL\Drip;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class DripServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton('Drip', function($app) {
            return new DripPhp();
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/drip.php' => config_path('drip.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/drip.php', 'drip'
        );
    }

    public function provides(): array
    {
        return [
            'Drip',
        ];
    }
}
