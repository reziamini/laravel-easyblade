<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class ConfigDirective implements Directivable
{
    public static function handle($parameter)
    {
        return "<?php echo config({$parameter}) ?>";
    }
}