<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class SessionExistsDirective implements Directivable
{
    public static function handle($parameter)
    {
        return "<?php if(session()->exists({$parameter})): ?>";
    }
}