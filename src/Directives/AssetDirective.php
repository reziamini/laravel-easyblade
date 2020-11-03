<?php

namespace EasyBlade\Directives;

class AssetDirective implements Directive
{
    public static function handle($parameter)
    {
        return '<?php echo asset('.$parameter.') ?>';
    }
}