<?php

namespace EasyBlade;

use EasyBlade\Directives\{
    OldDirective,
    UrlDirective,
    UserDirective,
    AssetDirective,
    CountDirective,
    ImageDirective,
    RouteDirective,
    StyleDirective,
    ConfigDirective,
    ScriptDirective,
    SessionDirective,
    isActiveDirective,
    EndConditionDirective,
    SessionExistsDirective
};
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class EasyBladeServiceProvider extends ServiceProvider
{
    const DIRECTIVES = [
        'route'            => RouteDirective::class,
        'url'              => UrlDirective::class,
        'asset'            => AssetDirective::class,
        'isActive'         => isActiveDirective::class,
        'count'            => CountDirective::class,
        'endcount'         => EndConditionDirective::class,
        'user'             => UserDirective::class,
        'sessionExists'    => SessionExistsDirective::class,
        'endsessionExists' => EndConditionDirective::class,
        'session'          => SessionDirective::class,
        'image'            => ImageDirective::class,
        'style'            => StyleDirective::class,
        'script'           => ScriptDirective::class,
        'config'           => ConfigDirective::class,
        'old'              => OldDirective::class,
    ];

    public function boot()
    {
        $this->registerDirectives();
    }

    public function registerDirectives()
    {
        foreach (static::DIRECTIVES as $directive => $class) {
            Blade::directive($directive, [$class, 'handle']);
        }
    }
}
