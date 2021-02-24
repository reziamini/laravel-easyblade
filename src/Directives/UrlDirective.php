<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class UrlDirective implements Directivable
{
    public static function handle($parameter)
    {
        return '<?php echo url('.$parameter.') ?>';
    }
}