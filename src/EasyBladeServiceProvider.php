<?php


namespace EasyBlade;


use EasyBlade\Directives\AssetDirective;
use EasyBlade\Directives\CountDirective;
use EasyBlade\Directives\EndCountDirective;
use EasyBlade\Directives\isActiveDirective;
use EasyBlade\Directives\RouteDirective;
use EasyBlade\Directives\SessionDirective;
use EasyBlade\Directives\EndSessionDirective;
use EasyBlade\Directives\SessionExistsDirective;
use EasyBlade\Directives\UrlDirective;
use EasyBlade\Directives\UserDirective;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class EasyBladeServiceProvider extends ServiceProvider
{

    const directives = [
        'route' => RouteDirective::class,
        'url' => UrlDirective::class,
        'asset' => AssetDirective::class,
        'isActive' => isActiveDirective::class,
        'count' => CountDirective::class,
        'endcount' => EndCountDirective::class,
        'user' => UserDirective::class,
        'sessionExists' => SessionExistsDirective::class,
        'endsessionExists' => EndSessionDirective::class,
    ];

    public function boot()
    {
        $this->registerDirectives();
    }

    public function registerDirectives()
    {
        foreach (static::directives as $directive => $class) {
            Blade::directive($directive, [$class, 'handle']);
        }
    }

}
