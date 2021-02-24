<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class RouteDirective implements Directivable
{
    public static function handle($parameter)
    {
        return '<?php echo route('.$parameter.') ?>';
    }
}