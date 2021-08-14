<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class AssetDirective implements Directivable
{
    public static function handle($parameter)
    {
        return '<?php echo asset('.$parameter.') ?>';
    }
}