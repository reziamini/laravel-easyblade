<?php

namespace EasyBlade\Directives;

class EndConditionDirective implements Directive
{
    public static function handle($parameter)
    {
        return '<?php endif; ?>';
    }
}