<?php

namespace EasyBlade\Directives;

class ConfigDirective implements Directive
{
    public static function handle($parameter)
    {
        return "<?php echo config({$parameter}) ?>";
    }
}