<?php

namespace EasyBlade\Directives;

class UserDirective implements Directive
{
    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);

        return "<?php if(\auth()->check()): echo \auth()->user()->{$parameter}; endif; ?>";
    }
}