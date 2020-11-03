<?php

namespace EasyBlade\Directives;

class SessionDirective implements Directive
{
    public static function handle($parameter)
    {
        return "<?php if(\session()->exists($parameter)){ echo \session()->get({$parameter}); } ?>";
    }
}