<?php

return [
    'directives' => [
        'route'            => \EasyBlade\Directives\RouteDirective::class,
        'url'              => \EasyBlade\Directives\UrlDirective::class,
        'asset'            => \EasyBlade\Directives\AssetDirective::class,
        'isActive'         => \EasyBlade\Directives\isActiveDirective::class,
        'count'            => \EasyBlade\Directives\CountDirective::class,
        'endcount'         => \EasyBlade\Directives\EndConditionDirective::class,
        'user'             => \EasyBlade\Directives\UserDirective::class,
        'sessionExists'    => \EasyBlade\Directives\SessionExistsDirective::class,
        'endsessionExists' => \EasyBlade\Directives\EndConditionDirective::class,
        'session'          => \EasyBlade\Directives\SessionDirective::class,
        'image'            => \EasyBlade\Directives\ImageDirective::class,
        'style'            => \EasyBlade\Directives\StyleDirective::class,
        'script'           => \EasyBlade\Directives\ScriptDirective::class,
        'config'           => \EasyBlade\Directives\ConfigDirective::class,
        'old'              => \EasyBlade\Directives\OldDirective::class,
    ]
];
