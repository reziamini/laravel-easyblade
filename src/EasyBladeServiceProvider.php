<?php

namespace EasyBlade;

use Illuminate\Support\Facades\Blade;
use EasyBlade\Directives\OldDirective;
use EasyBlade\Directives\UrlDirective;
use EasyBlade\Directives\UserDirective;
use Illuminate\Support\ServiceProvider;
use EasyBlade\Directives\AssetDirective;
use EasyBlade\Directives\CountDirective;
use EasyBlade\Directives\ImageDirective;
use EasyBlade\Directives\RouteDirective;
use EasyBlade\Directives\StyleDirective;
use EasyBlade\Directives\ConfigDirective;
use EasyBlade\Directives\ScriptDirective;
use EasyBlade\Directives\SessionDirective;
use EasyBlade\Directives\isActiveDirective;
use EasyBlade\Directives\EndConditionDirective;
use EasyBlade\Directives\SessionExistsDirective;

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