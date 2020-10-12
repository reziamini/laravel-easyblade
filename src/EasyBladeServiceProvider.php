<?php


namespace EasyBlade;


use EasyBlade\Directives\RouteDirective;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class EasyBladeServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Blade::directive('route', [RouteDirective::class, 'handle']);
    }

}