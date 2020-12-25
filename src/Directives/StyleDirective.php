<?php

namespace EasyBlade\Directives;

class StyleDirective implements Directive
{
    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);

        return "<link href='{$parameter}' rel='stylesheet'>";
    }
}