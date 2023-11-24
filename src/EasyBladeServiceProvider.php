<?php

namespace EasyBlade;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class EasyBladeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/easyblade.php', 'easyblade'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/easyblade.php' => config_path('easyblade.php'),
        ]);
        
        $this->registerDirectives();
    }

    public function registerDirectives()
    {
        foreach (config('easyblade.directives', []) as $directive => $class) {
            Blade::directive($directive, [$class, 'handle']);
        }
    }
}
