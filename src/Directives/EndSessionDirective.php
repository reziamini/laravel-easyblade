<?php

namespace EasyBlade\Directives;

class EndSessionDirective implements Directive
{
    public static function handle($parameter)
    {
        return '<?php endif; ?>';
    }
}
