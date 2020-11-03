<?php

namespace EasyBlade\Directives;

class UrlDirective implements Directive
{
    public static function handle($parameter)
    {
        return '<?php echo url('.$parameter.') ?>';
    }
}