<?php

namespace EasyBlade;

use EasyBlade\Directives\AssetDirective;
use EasyBlade\Directives\ConfigDirective;
use EasyBlade\Directives\CountDirective;
use EasyBlade\Directives\EndCountDirective;
use EasyBlade\Directives\EndSessionDirective;
use EasyBlade\Directives\ImageDirective;
use EasyBlade\Directives\isActiveDirective;
use EasyBlade\Directives\OldDirective;
use EasyBlade\Directives\RouteDirective;
use EasyBlade\Directives\ScriptDirective;
use EasyBlade\Directives\SessionDirective;
use EasyBlade\Directives\SessionExistsDirective;
use EasyBlade\Directives\StyleDirective;
use EasyBlade\Directives\UrlDirective;
use EasyBlade\Directives\UserDirective;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class EasyBladeServiceProvider extends ServiceProvider
{
    const directives = [
        'route'            => RouteDirective::class,
        'url'              => UrlDirective::class,
        'asset'            => AssetDirective::class,
        'isActive'         => isActiveDirective::class,
        'count'            => CountDirective::class,
        'endcount'         => EndCountDirective::class,
        'user'             => UserDirective::class,
        'sessionExists'    => SessionExistsDirective::class,
        'endsessionExists' => EndSessionDirective::class,
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
        foreach (static::directives as $directive => $class) {
            Blade::directive($directive, [$class, 'handle']);
        }
    }
}