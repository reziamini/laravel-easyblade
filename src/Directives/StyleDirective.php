<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class StyleDirective implements Directivable
{
    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);

        return "<link href='{$parameter}' rel='stylesheet'>";
    }
}