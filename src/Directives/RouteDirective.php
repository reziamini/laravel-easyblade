<?php

namespace EasyBlade\Directives;

class RouteDirective implements Directive
{
    public static function handle($parameter)
    {
        return '<?php echo route('.$parameter.') ?>';
    }
}