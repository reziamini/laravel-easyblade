<?php


namespace EasyBlade;


use EasyBlade\Directives\AssetDirective;
use EasyBlade\Directives\isActiveDirective;
use EasyBlade\Directives\RouteDirective;
use EasyBlade\Directives\UrlDirective;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class EasyBladeServiceProvider extends ServiceProvider
{

    const directives = [
        'route' => RouteDirective::class,
        'url' => UrlDirective::class,
        'asset' => AssetDirective::class,
        'isActive' => isActiveDirective::class,
    ];

    public function boot()
    {
        foreach (static::directives as $directive => $class) {
            Blade::directive($directive, [$class, 'handle']);
        }
    }

}