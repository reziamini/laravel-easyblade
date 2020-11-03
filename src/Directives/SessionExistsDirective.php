<?php

namespace EasyBlade\Directives;

class SessionExistsDirective implements Directive
{
    public static function handle($parameter)
    {
        return "<?php if(session()->exists({$parameter})): ?>";
    }
}