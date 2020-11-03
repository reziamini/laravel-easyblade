<?php

namespace EasyBlade\Directives;

class EndCountDirective implements Directive
{
    public static function handle($parameter)
    {
        return '<?php endif; ?>';
    }
}