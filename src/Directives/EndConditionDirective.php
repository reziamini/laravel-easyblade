<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class EndConditionDirective implements Directivable
{
    public static function handle($parameter)
    {
        return '<?php endif; ?>';
    }
}