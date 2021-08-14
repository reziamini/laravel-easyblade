<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class SessionDirective implements Directivable
{
    public static function handle($parameter)
    {
        return "<?php if(\session()->exists($parameter)){ echo \session()->get({$parameter}); } ?>";
    }
}